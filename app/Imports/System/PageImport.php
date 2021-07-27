<?php

namespace App\Imports\System;

use App\Models\System\Page;
use App\Models\System\Module;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PageImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $module = Module::firstWhere('slug', $row['module']);
        $parent = $row['parent'] ? Page::firstWhere('slug', $row['parent']) : null;

        if (! $module) {
            return;
        }

        return new Page([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'title' => $row['title'],
            'icon' => $row['icon'],
            'prefix' => $row['prefix'],
            'path' => $row['path'],
            'side' => (bool) $row['side'],
            'dock' => (bool) $row['dock'],
            'module_id' => $module->id,
            'parent_id' => optional($parent)->id
        ]);
    }
}
