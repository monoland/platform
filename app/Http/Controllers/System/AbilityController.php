<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Resources\System\AbilityCollection;
use App\Http\Resources\System\AbilityResource;
use App\Models\System\Ability;
use Illuminate\Http\Request;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Ability::class);

        return new AbilityCollection(
            Ability::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Ability::class);

        $this->validate($request, []);

        return Ability::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function show(Ability $ability)
    {
        $this->authorize('show', $ability);

        return new AbilityResource($ability);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ability $ability)
    {
        $this->authorize('update', $ability);

        $this->validate($request, []);

        return Ability::updateRecord($request, $ability);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System\Ability $ability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ability $ability)
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
    public function restore(Ability $ability)
    {
        $this->authorize('restore', Ability::class);

        return Ability::restoreRecord($ability);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\System\Ability $ability
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Ability $ability)
    {
        $this->authorize('destroy', Ability::class);

        return Ability::destroyRecord($ability);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Ability::class);

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
        $this->authorize('export', Ability::class);

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
        $this->authorize('report', Ability::class);

        //
    }
}
