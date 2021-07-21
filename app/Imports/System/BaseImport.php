<?php

namespace App\Imports\System;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BaseImport implements WithMultipleSheets
{
    /**
     * the module has role table
     */
    protected $hasRoles;
    
    /**
     * base module constructor
     */
    public function __construct($hasRoles = false)
    {
        $this->hasRoles = $hasRoles;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        if ($this->hasRoles) {
            $sheets['roles'] = new RoleImport();
        }

        $sheets['module'] = new ModuleImport();
        $sheets['pages'] = new PageImport();
        $sheets['permissions'] = new PermissionImport();
        $sheets['abilities'] = new AbilityImport();
        $sheets['abilities-pages'] = new AbilityPageImport();
        $sheets['abilities-permissions'] = new AbilityPermissionImport();

        return $sheets;
    }
}
