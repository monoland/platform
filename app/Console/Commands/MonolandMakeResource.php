<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class MonolandMakeResource extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'monoland:resource';

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
    protected $type = 'Resource';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->isCollection() ?
            $this->resolveStubPath('/stubs/resource.collection.stub') :
            (
                $this->isShowResource() ?
                $this->resolveStubPath('/stubs/resource.show.stub') :
                $this->resolveStubPath('/stubs/resource.stub')
            );
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
        ];

        if ($this->isCollection()) {
            $searches['ClassName'] = Str::of($this->argument('name'))->before('Collection')->ucfirst();
            $searches['ResourceClass'] = Str::of($this->argument('name'))->before('Collection')->append('Resource');
            $searches['ResourceName'] = $this->studlyToSlug(Str::of($this->argument('name'))->before('Collection'), '-');

            if ($this->option('module')) {
                $searches['ModuleName'] = Str::of($this->option('module'))->lower();
            }
        }

        if ($this->isShowResource()) {
            $searches['ResourceClass'] = Str::of($this->argument('name'))->before('ShowResource')->append('Resource');
            $searches['ResourceName'] = $this->studlyToSlug(Str::of($this->argument('name'))->before('ShowResource'), '-');

            if ($this->option('module')) {
                $searches['ModuleName'] = Str::of($this->option('module'))->lower();
            }
        }

        $stub = str_replace(
            array_keys($searches),
            array_values($searches),
            $stub
        );

        return $this;
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
        return $rootNamespace . '\Http\Resources';
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    protected function isCollection()
    {
        return $this->option('collection') || Str::endsWith($this->argument('name'), 'Collection');
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    protected function isShowResource()
    {
        return Str::endsWith($this->argument('name'), 'ShowResource');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function handle()
    {
        if ($this->isCollection()) {
            $this->type = 'Collection';
        }

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

        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($dirpath)));

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
            ['collection', 'c', InputOption::VALUE_OPTIONAL, 'Create resource collection'],
            ['module', 'm', InputOption::VALUE_OPTIONAL, 'The module that the resource applies to'],
        ];
    }
}
