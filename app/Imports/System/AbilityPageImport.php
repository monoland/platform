<?php

namespace App\Imports\System;

use App\Models\System\Role;
use Illuminate\Support\Str;
use App\Models\System\Ability;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbilityPageImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (Str::of($row['role'])->contains('*')) {
                $this->processDataOnAsterisk($row);
            } elseif (Str::of($row['role'])->contains(',')) {
                $this->processDataOnComma($row);
            } else {
                $this->processDataOnSingle($row);
            }
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $row
     * @return void
     */
    private function processDataOnAsterisk($row)
    {
        if ($roles = Role::all()) {
            foreach ($roles as $role) {
                $slug = Str::slug($row['module'] . ' ' . $role->slug);

                if ($ability = Ability::firstWhere('name', $slug)) {
                    $ability->attachPage($row['page']);
                }
            }
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $row
     * @return void
     */
    private function processDataOnComma($row)
    {
        if ($roles = Role::whereIn('slug', array_map('trim', Str::of($row['role'])->explode(',')->toArray()))->get()) {
            foreach ($roles as $role) {
                $slug = Str::slug($row['module'] . ' ' . $role->slug);

                if ($ability = Ability::firstWhere('name', $slug)) {
                    $ability->attachPage($row['page']);
                }
            }
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $row
     * @return void
     */
    private function processDataOnSingle($row)
    {
        $slug = Str::slug($row['module'] . ' ' . $row['role']);

        if ($ability = Ability::firstWhere('name', $slug)) {
            $ability->attachPage($row['page']);
        }
    }
}
