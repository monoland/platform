<?php

namespace App\Console\Commands;

use InvalidArgumentException;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class MonolandMakeController extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'monoland:controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new monoland controller class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controller';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stubpath = $this->option('parent') ?
            '/stubs/controller.parent.stub' :
            '/stubs/controller.model.stub';

        return $this->resolveStubPath($stubpath);
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
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Controllers';
    }

    /**
     * Build the class with the given name.
     *
     * Remove the base controller import if we are already in base namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $controllerNamespace = $this->getNamespace($name);

        $replace = [];

        if ($this->option('parent')) {
            $replace = $this->buildParentReplacements();
        }

        if ($this->option('model')) {
            $replace = $this->buildModelReplacements($replace);
        }

        $replace["use {$controllerNamespace}\Controller;\n"] = '';

        return str_replace(
            array_keys($replace),
            array_values($replace),
            parent::buildClass($name)
        );
    }

    /**
     * Build the replacements for a parent controller.
     *
     * @return array
     */
    protected function buildParentReplacements()
    {
        $parentModelClass = $this->parseModel(
            'Models' . DIRECTORY_SEPARATOR . $this->option('parent')
        );

        if ($module = $this->option('module')) {
            $parentModelClass = $this->parseModel(
                'Models' . DIRECTORY_SEPARATOR . Str::studly($module) . DIRECTORY_SEPARATOR . Str::studly($this->option('parent'))
            );
        }

        if (
            !class_exists($parentModelClass) &&
            $this->confirm("A {$parentModelClass} model does not exist. Do you want to generate it?", true)
        ) {
            $this->call('make:model', ['name' => $parentModelClass]);
        }

        return [
            'ParentDummyFullModelClass' => $parentModelClass,
            '{{ namespacedParentModel }}' => $parentModelClass,
            '{{namespacedParentModel}}' => $parentModelClass,
            'ParentDummyModelClass' => class_basename($parentModelClass),
            '{{ parentModel }}' => class_basename($parentModelClass),
            '{{parentModel}}' => class_basename($parentModelClass),
            'ParentDummyModelVariable' => lcfirst(class_basename($parentModelClass)),
            '{{ parentModelVariable }}' => lcfirst(class_basename($parentModelClass)),
            '{{parentModelVariable}}' => lcfirst(class_basename($parentModelClass)),
        ];
    }

    /**
     * Build the model replacement values.
     *
     * @param  array  $replace
     * @return array
     */
    protected function buildModelReplacements(array $replace)
    {
        $modelClass = $this->parseModel(
            'Models' . DIRECTORY_SEPARATOR . $this->option('model')
        );

        if ($module = $this->option('module')) {
            $modelClass = $this->parseModel(
                'Models' . DIRECTORY_SEPARATOR . Str::studly($module) . DIRECTORY_SEPARATOR . $this->option('model')
            );
        }

        if (
            !class_exists($modelClass) &&
            $this->confirm("A {$modelClass} model does not exist. Do you want to generate it?", true)
        ) {
            $this->call('make:model', ['name' => $modelClass]);
        }

        return array_merge($replace, [
            'DummyFullModelClass' => $modelClass,
            '{{ namespacedModel }}' => $modelClass,
            '{{namespacedModel}}' => $modelClass,
            'DummyModuleClass' => Str::of($this->option('module'))->studly(),
            'DummyModelClass' => class_basename($modelClass),
            '{{ model }}' => class_basename($modelClass),
            '{{model}}' => class_basename($modelClass),
            'DummyModelVariable' => lcfirst(class_basename($modelClass)),
            'DummyModelVariables' => Str::plural(lcfirst(class_basename($modelClass))),
            '{{ modelVariable }}' => lcfirst(class_basename($modelClass)),
            '{{modelVariable}}' => lcfirst(class_basename($modelClass)),
        ]);
    }

    /**
     * Get the fully-qualified model class name.
     *
     * @param  string  $model
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    protected function parseModel($model)
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $model)) {
            throw new InvalidArgumentException('Model name contains invalid characters.');
        }

        $model = trim(str_replace('/', '\\', $model), '\\');

        if (!Str::startsWith($model, $rootNamespace = $this->laravel->getNamespace())) {
            $model = $rootNamespace . $model;
        }

        return $model;
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

        $clspath = Str::studly(class_basename($this->argument('name')));

        if ($this->option('module')) {
            $clspath = Str::studly(class_basename($this->option('module'))) . DIRECTORY_SEPARATOR . $clspath;
        }

        $clsname = $this->qualifyClass($clspath);

        $path = $this->getPath($clsname);

        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($clsname)));

        $this->info($this->type . ' created successfully.');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['module', 'm', InputOption::VALUE_OPTIONAL, 'The module that the model applies to'],
            ['model', 'd', InputOption::VALUE_OPTIONAL, 'Generate a resource controller for the given model.'],
            ['parent', 'p', InputOption::VALUE_OPTIONAL, 'Generate a nested resource controller class.'],
        ];
    }
}
