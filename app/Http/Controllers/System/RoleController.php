<?php

namespace App\Http\Controllers\System;

use App\Models\System\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\System\RoleResource;
use App\Http\Resources\System\RoleCollection;
use App\Http\Resources\System\RoleShowResource;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Role::class);

        return new RoleCollection(
            Role::filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Role::class);

        $this->validate($request, []);

        return Role::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('show', $role);

        return new RoleShowResource($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);

        $this->validate($request, []);

        return Role::updateRecord($request, $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        return Role::deleteRecord($role);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\System\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function restore(Role $role)
    {
        $this->authorize('restore', Role::class);

        return Role::restoreRecord($role);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\System\Role $role
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Role $role)
    {
        $this->authorize('destroy', Role::class);

        return Role::destroyRecord($role);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Role::class);

        //
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $this->authorize('export', Role::class);

        //
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        $this->authorize('report', Role::class);

        //
    }
}
