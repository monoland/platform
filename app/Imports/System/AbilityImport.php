<?php

namespace App\Imports\System;

use App\Models\System\Role;
use Illuminate\Support\Str;
use App\Models\System\Module;
use App\Models\System\Ability;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbilityImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $module = Module::firstWhere('slug', $row['module']);

        if (! $module) {
            return;
        }

        $role = Role::firstWhere('slug', $row['role']);

        if (! $role) {
            return;
        }

        return new Ability([
            'name' => Str::slug($row['module'] . ' ' . $row['role']),
            'slug' => Str::slug($row['module'] . ' ' . $row['role']),
            'module_id' => $module->id,
            'role_id' => $role->id,
        ]);
    }
}
