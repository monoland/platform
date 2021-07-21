<?php

namespace App\Imports\System;

use App\Models\System\Page;
use Illuminate\Support\Str;
use App\Models\System\Permission;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PermissionImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $page = Page::firstWhere('slug', $row['page']);

        if (! $page) {
            return;
        }

        if (Str::of($row['permissions'])->contains(',')) {
            $permissions = array_map('trim', Str::of($row['permissions'])->explode(',')->toArray());
            foreach ($permissions as $permission) {
                Permission::create([
                    'name' => $permission,
                    'slug' => Str::slug($permission . ' ' . $row['page']),
                    'page_id' => $page->id,
                    'module_id' => $page->module_id
                ]);
            }
        } else {
            Permission::create([
                'name' => $row['permissions'],
                'slug' => Str::slug($row['permissions'] . ' ' . $row['page']),
                'page_id' => $page->id,
                'module_id' => $page->module_id
            ]);
        }
    }
}
