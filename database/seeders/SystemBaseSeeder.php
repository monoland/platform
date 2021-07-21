<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\System\BaseImport;
use Maatwebsite\Excel\Facades\Excel;

class SystemBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(
            new BaseImport(true),
            database_path('excels'.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'base-seeder.xlsx')
        );
    }
}
