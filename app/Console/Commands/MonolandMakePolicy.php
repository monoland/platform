<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Str;

class MonolandMakePolicy extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'monoland:policy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new monoland policy class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Policy';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/policy.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__ . $stub;
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->replaceUserNamespace(
            parent::buildClass($name)
        );

        $model = $this->option('model');

        return $model ? $this->replaceModel($stub, $model) : $stub;
    }

    /**
     * Replace the User model namespace.
     *
     * @param  string  $stub
     * @return string
     */
    protected function replaceUserNamespace($stub)
    {
        $model = $this->userProviderModel();

        if (!$model) {
            return $stub;
        }

        return str_replace(
            $this->rootNamespace() . 'User',
            $model,
            $stub
        );
    }

    /**
     * Replace the model for the given stub.
     *
     * @param  string  $stub
     * @param  string  $model
     * @return string
     */
    protected function replaceModel($stub, $model)
    {
        $model = str_replace('/', '\\', $model);

        $namespaceModel = $this->laravel->getNamespace() . 'Models' . '\\' . $model;

        if ($this->option('module')) {
            $namespaceModel = $this->laravel->getNamespace() . 'Models' . '\\' . Str::studly($this->option('module')) . '\\' . $model;
        }

        if (Str::startsWith($model, '\\')) {
            $stub = str_replace('NamespacedDummyModel', trim($model, '\\'), $stub);
        } else {
            $stub = str_replace('NamespacedDummyModel', $namespaceModel, $stub);
        }

        $stub = str_replace(
            "use {$namespaceModel};\nuse {$namespaceModel};",
            "use {$namespaceModel};",
            $stub
        );

        $model = class_basename(trim($model, '\\'));

        $dummyUser = class_basename($this->userProviderModel());

        $dummyModel = Str::camel($model) === 'user' ? 'model' : $model;

        $stub = str_replace('DocDummyModel', Str::snake($dummyModel, ' '), $stub);

        $stub = str_replace('DummyModel', $model, $stub);
        
        $stub = str_replace('dummyModelSlug', $this->studlyToSlug($dummyModel, '-'), $stub);
        
        $stub = str_replace('dummyModel', Str::camel($dummyModel), $stub);

        $stub = str_replace('DummyUser', $dummyUser, $stub);

        $stub = str_replace('dummyModule', strtolower($this->option('module')), $stub);

        return str_replace('DocDummyPluralModel', Str::snake(Str::pluralStudly($dummyModel), ' '), $stub);
    }

    protected function studlyToSlug($params, $prefix = '_'): string
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $params, $matches);

        $ret = $matches[0];

        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }

        return implode($prefix, $ret);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Policies';
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function handle()
    {
        if ($this->isReservedName($this->getNameInput())) {
            $this->error('The name "' . $this->getNameInput() . '" is reserved by PHP.');

            return false;
        }

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');

            return false;
        }

        $clsname = Str::studly(class_basename($this->argument('name')));
        $dirpath = $this->qualifyClass($clsname);

        if ($this->option('module')) {
            $dirpath = $this->qualifyClass(Str::studly($this->option('module')) . DIRECTORY_SEPARATOR . $clsname);
        }

        $path = $this->getPath($dirpath);

        $this->sortImports($this->buildClass($dirpath));

        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($dirpath)));

        $this->info($this->type . ' created successfully.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['model', 'd', InputOption::VALUE_OPTIONAL, 'The model that the policy applies to'],
            ['module', 'm', InputOption::VALUE_OPTIONAL, 'The module that the policy applies to'],
        ];
    }
}
