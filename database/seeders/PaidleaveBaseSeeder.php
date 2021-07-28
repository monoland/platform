<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\System\BaseImport;
use Maatwebsite\Excel\Facades\Excel;

class PaidleaveBaseSeeder extends Seeder
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
            database_path('excels'.DIRECTORY_SEPARATOR.'paidleave'.DIRECTORY_SEPARATOR.'base-seeder.xlsx')
        );
    }
}
