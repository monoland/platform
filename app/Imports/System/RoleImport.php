<?php

namespace App\Imports\System;

use App\Models\System\Role;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RoleImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Role([
            'name' => $row['name'],
            'slug' => $row['slug']
        ]);
    }
}
