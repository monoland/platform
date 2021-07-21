<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Models\System\Module;
use App\Http\Controllers\Controller;
use App\Http\Resources\System\ModuleCollection;
use App\Http\Resources\System\ModuleShowResource;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Module::class);

        return new ModuleCollection(
            Module::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Module::class);

        $this->validate($request, []);

        return Module::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        $this->authorize('show', $module);

        return new ModuleShowResource($module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $this->authorize('update', $module);

        $this->validate($request, []);

        return Module::updateRecord($request, $module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System\Module $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $this->authorize('delete', $module);

        return Module::deleteRecord($module);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function restore(Module $module)
    {
        $this->authorize('restore', Module::class);

        return Module::restoreRecord($module);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\System\Module $module
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Module $module)
    {
        $this->authorize('destroy', Module::class);

        return Module::destroyRecord($module);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Module::class);

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
        $this->authorize('export', Module::class);

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
        $this->authorize('report', Module::class);

        //
    }
}
