<?php

namespace App\Imports\System;

use App\Models\System\Module;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ModuleImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Module([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'path' => $row['path'],
            'icon' => $row['icon'],
            'color' => $row['color'],
            'describe' => $row['describe'],
            'visibility' => (bool) $row['visibility'],
        ]);
    }
}
