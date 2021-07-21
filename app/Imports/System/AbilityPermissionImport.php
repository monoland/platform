<?php

namespace App\Imports\System;

use App\Models\System\Role;
use Illuminate\Support\Str;
use App\Models\System\Ability;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbilityPermissionImport implements ToCollection, WithHeadingRow
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
     * @param [type] $ability
     * @param [type] $row
     * @return void
     */
    private function abilityPermissions($ability, $row)
    {
        if (Str::of($row['permission'])->contains('*')) {
            $this->permissionOnAsterisk($ability, $row);
        } elseif (Str::of($row['permission'])->contains(',')) {
            $this->permissionOnComma($ability, $row);
        } else {
            $this->permissionOnSingle($ability, $row);
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
                    $this->abilityPermissions($ability, $row);
                }
            }
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $ability
     * @param [type] $row
     * @return void
     */
    private function permissionOnAsterisk($ability, $row)
    {
        if ($ability && $page = $ability->pages()->firstWhere('system_pages.slug', $row['page'])) {
            $permissions = $page->permissions;

            foreach ($permissions as $permission) {
                $ability->attachPermission($page, $permission);
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
                    $this->abilityPermissions($ability, $row);
                }
            }
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $ability
     * @param [type] $row
     * @return void
     */
    private function permissionOnComma($ability, $row)
    {
        if ($ability && $page = $ability->pages()->firstWhere('system_pages.slug', $row['page'])) {
            $permissions = $page->permissions()
                ->whereIn('system_permissions.name', array_map('trim', Str::of($row['permission'])->explode(',')->toArray()))
                ->get();

            foreach ($permissions as $permission) {
                $ability->attachPermission($page, $permission);
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
            $this->abilityPermissions($ability, $row);
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $ability
     * @param [type] $row
     * @return void
     */
    private function permissionOnSingle($ability, $row)
    {
        if ($ability && $page = $ability->pages()->firstWhere('system_pages.slug', $row['page'])) {
            $permissions = $page->permissions()
                ->where('system_permissions.name', $row['permission'])
                ->get();

            foreach ($permissions as $permission) {
                $ability->attachPermission($page, $permission);
            }
        }
    }
}
