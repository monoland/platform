<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Models\System\Module;
use App\Models\System\Ability;
use App\Http\Controllers\Controller;
use App\Http\Resources\System\AbilityCollection;
use App\Http\Resources\System\AbilityShowResource;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Module $module)
    {
        $this->authorize('view', Ability::class);

        return new AbilityCollection(
            $module->abilities()->with(['module', 'role'])->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Module $module)
    {
        $this->authorize('create', Ability::class);

        $this->validate($request, []);

        return Ability::storeRecord($request, $module);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System\Module  $module
     * @param  \App\Models\System\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module, Ability $ability)
    {
        $this->authorize('show', $ability);

        return new AbilityShowResource($ability);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @param  \App\Models\System\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module, Ability $ability)
    {
        $this->authorize('update', $ability);

        $this->validate($request, []);

        return Ability::updateRecord($request, $ability);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System\Module  $module
     * @param  \App\Models\System\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module, Ability $ability)
    {
        $this->authorize('delete', $ability);

        return Ability::deleteRecord($ability);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\System\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function restore(Module $module, Ability $ability)
    {
        $this->authorize('restore', $ability);

        return Ability::restoreRecord($ability);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\System\Ability $ability
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Module $module, Ability $ability)
    {
        $this->authorize('destroy', $ability);

        return Ability::destroyRecord($ability);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Module $module)
    {
        $this->authorize('import', Ability::class);

        //
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Module $module)
    {
        $this->authorize('export', Ability::class);

        //
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Module $module)
    {
        $this->authorize('report', Ability::class);

        //
    }
}
