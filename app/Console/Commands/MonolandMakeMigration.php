<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class MonolandMakeMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monoland:migrate
        {module=all}
        {--r|register=true}
        {--s|seeder=true}
        {--w|wipe=true}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monoland migrate database and seed';

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $modules = [
        'system', //done
        'account', //done
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $module = $this->argument('module');
        $register = $this->option('register') === 'true';
        $seeder = $this->option('seeder') === 'true';
        $wipe = $this->option('wipe') === 'true';

        if ($wipe) {
            $this->call('db:wipe');
            $this->call('migrate', ['--path' => '/database/migrations/accounts', '--force' => true]);
        }

        if ($module === 'all') {
            foreach ($this->modules as $module) {
                $this->migrateOnModule($module, $register, $seeder, $wipe);
            }
        } else {
            if (in_array($module, $this->modules)) {
                $this->migrateOnModule($module, $register, $seeder, $wipe);
            } else {
                $this->error("module: {$module} don't exist");
            }
        }

        $this->call('db:seed');
        $this->call('cache:clear');
    }

    /**
     * Undocumented function
     *
     * @param [type] $module
     * @param [type] $register
     * @param [type] $seeder
     * @param [type] $wipe
     * @return void
     */
    protected function migrateOnModule($module, $register, $seeder, $wipe)
    {
        $migrations = [];

        if (File::exists(database_path('migrations'.DIRECTORY_SEPARATOR.$module))) {
            $files = File::files(database_path('migrations'.DIRECTORY_SEPARATOR.$module));

            foreach ($files as $file) {
                array_push($migrations, $file->getFilenameWithoutExtension());
            }
    
            if (Schema::hasTable('migrations')) {
                $tables = DB::table('migrations')->get();
    
                foreach ($tables as $table) {
                    if (in_array($table->migration, $migrations)) {
                        DB::table('migrations')->where('id', $table->id)->delete();
                    }
                }
            }
    
            foreach ($files as $file) {
                $content = $file->getContents();
    
                while (Str::of($content)->contains("Schema::dropIfExists")) {
                    $content = Str::of($content)->after("Schema::dropIfExists('");
                    $tableName = Str::of($content)->before("');")->__toString();
    
                    if (Str::length($tableName) > 0) {
                        Schema::dropIfExists($tableName);
                    }
                }
            }
        }

        $this->call('migrate', ['--path' => '/database/migrations/' . $module, '--force' => true]);

        if ($register && class_exists('Database\\Seeders\\' . Str::studly($module) . 'BaseSeeder')) {
            if ($wipe) {
                $this->call('db:seed', ['--class' => Str::studly($module) . 'BaseSeeder', '--force' => true]);
            } else {
                //
            }
        }

        if ($seeder && class_exists('Database\\Seeders\\' . Str::studly($module) . 'DataSeeder')) {
            $this->call('db:seed', ['--class' => Str::studly($module) . 'DataSeeder', '--force' => true]);
        }
    }
}
