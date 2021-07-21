<?php

namespace Database\Seeders;

use App\Imports\System\BaseImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class AccountBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(
            new BaseImport(),
            database_path('excels'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'base-seeder.xlsx')
        );
    }
}
