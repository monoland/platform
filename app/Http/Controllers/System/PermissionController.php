<?php

namespace App\Http\Controllers\System;

use App\Models\System\Page;
use Illuminate\Http\Request;
use App\Models\System\Permission;
use App\Http\Controllers\Controller;
use App\Http\Resources\System\PermissionCollection;
use App\Http\Resources\System\PermissionShowResource;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Page $page)
    {
        $this->authorize('view', Permission::class);

        return new PermissionCollection(
            $page->permissions()->with(['module', 'page'])->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Page $page)
    {
        $this->authorize('create', Permission::class);

        $this->validate($request, []);

        return Permission::storeRecord($request, $page);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System\Page  $page
     * @param  \App\Models\System\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page, Permission $permission)
    {
        $this->authorize('show', $permission);

        return new PermissionShowResource($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Page  $page
     * @param  \App\Models\System\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page, Permission $permission)
    {
        $this->authorize('update', $permission);

        $this->validate($request, []);

        return Permission::updateRecord($request, $permission, $page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System\Page  $page
     * @param  \App\Models\System\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page, Permission $permission)
    {
        $this->authorize('delete', $permission);

        return Permission::deleteRecord($permission);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\System\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function restore(Page $page, Permission $permission)
    {
        $this->authorize('restore', Permission::class);

        return Permission::restoreRecord($permission);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\System\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Page $page, Permission $permission)
    {
        $this->authorize('destroy', Permission::class);

        return Permission::destroyRecord($permission);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Page $page)
    {
        $this->authorize('import', Permission::class);

        //
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Page $page)
    {
        $this->authorize('export', Permission::class);

        //
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Page $page)
    {
        $this->authorize('report', Permission::class);

        //
    }
}
