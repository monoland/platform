<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Str;

class MonolandMakeModel extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'monoland:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new monoland model class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/model.stub');
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
     * Replace the namespace for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $searches = [
            'DummyNamespace' => $this->getNamespace($name),
            'DummyRootNamespace' => $this->rootNamespace(),
            'NamespacedDummyUserModel' => $this->userProviderModel(),
        ];

        if ($this->option('module')) {
            $searches['DummyModuleName'] = Str::of($this->option('module'))->studly();
            $searches['DummyTableName'] = Str::of($this->option('module'))->lower() . '_' .
                Str::of($this->studlyToSlug(Str::of($this->getNameInput())))->plural();
        }

        $stub = str_replace(
            array_keys($searches),
            array_values($searches),
            $stub
        );

        return $this;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->createModel();

        $this->createMigration();
        $this->createResource();
        $this->createShowResource();
        $this->createCollection();
        $this->createPolicy();
        $this->createController();
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
     * Undocumented function
     *
     * @return void
     */
    protected function createModel()
    {
        if ($this->isReservedName($this->getNameInput())) {
            $this->error('The name "' . $this->getNameInput() . '" is reserved by PHP.');

            return false;
        }

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');

            return false;
        }

        $model = Str::studly(class_basename($this->argument('name')));
        $filepath = $this->qualifyClass('Models' . DIRECTORY_SEPARATOR . $model);

        if ($this->option('module')) {
            $module = Str::studly(class_basename($this->option('module')));
            $filepath = $this->qualifyClass('Models' . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . $model);
        }

        $path = $this->getPath($filepath);

        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($filepath)));

        $this->info($this->type . ' created successfully.');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function createMigration()
    {
        $table = Str::snake(
            Str::pluralStudly(class_basename($this->argument('name')))
        );

        $folderpath = database_path('migrations');

        $options = [
            'name' => "create_{$table}_table",
            '--create' => $table,
        ];

        if ($this->option('module')) {
            $module = Str::of($this->option('module'))->lower();
            $folderpath .= DIRECTORY_SEPARATOR . $module;
            
            $options['name'] = "create_{$module}_{$table}_table";
            $options['--create'] = "{$module}_{$table}";
            $options['--path'] = '/database/migrations/' . Str::of($this->option('module'))->lower();
        }

        if ($this->files->exists($folderpath)) {
            $this->makeDirectory($folderpath);
        }

        $this->call('make:migration', $options);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function createResource()
    {
        $basename = Str::studly(class_basename($this->argument('name')));

        $options = [
            'name' => Str::studly("{$basename}Resource")
        ];

        if ($this->option('module')) {
            $options['--module'] = $this->option('module');
        }

        $this->call('monoland:resource', $options);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function createShowResource()
    {
        $basename = Str::studly(class_basename($this->argument('name')));

        $options = [
            'name' => Str::studly("{$basename}ShowResource")
        ];

        if ($this->option('module')) {
            $options['--module'] = $this->option('module');
        }

        $this->call('monoland:resource', $options);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function createCollection()
    {
        $basename = Str::studly(class_basename($this->argument('name')));

        $options = [
            'name' => Str::studly("{$basename}Collection")
        ];

        if ($this->option('module')) {
            $options['--module'] = $this->option('module');
        }

        $this->call('monoland:resource', $options);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function createPolicy()
    {
        $basename = Str::studly(class_basename($this->argument('name')));

        $this->call('monoland:policy', [
            'name' => $basename . 'Policy',
            '--model' => $basename,
            '--module' => $this->option('module')
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function createController()
    {
        $basename = Str::studly(class_basename($this->argument('name')));

        $this->call('monoland:controller', [
            'name' => $basename . 'Controller',
            '--model' => $basename,
            '--module' => $this->option('module'),
            '--parent' => $this->option('parent')
        ]);
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
            ['parent', 'p', InputOption::VALUE_OPTIONAL, 'Generate a nested resource controller class.'],
        ];
    }
}
