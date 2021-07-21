<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' =>  'superadmin',
            'email' => 'monoland@dev',
            'password' => Hash::make('12345'),
            'theme' => 'blue-grey'
        ]);

        $superadmin->attachAbilities(
            'myaccount-superadmin',
            'system-superadmin',
        );
    }
}
