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

        $pegawai = User::create([
            'name' =>  'pegawai',
            'email' => 'pegawai@dev',
            'password' => Hash::make('12345'),
            'theme' => 'blue-grey'
        ]);

        $superadmin->attachAbilities(
            'myaccount-superadmin',
            'system-superadmin',
            'reference-superadmin',
            'organization-superadmin',
            'paidleave-superadmin',
            'allowance-superadmin',
            'development-superadmin',
            'pension-superadmin',
            'payincrease-superadmin',
            'promotion-superadmin',
            'myprofile-superadmin',
            'myhistory-superadmin',
            'myservice-superadmin',
            'staffing-superadmin',
            'superior-superadmin',
            'leader-superadmin',
        );

        $pegawai->attachAbilities(
            'myaccount-pegawai',
            'myprofile-superadmin',
            'myhistory-superadmin',
            'myservice-superadmin',
        );
    }
}
