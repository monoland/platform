<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\VillageCollection;
use App\Models\Reference\District;
use App\Models\Reference\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\District  $district
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, District $district)
    {
        $this->authorize('view', Village::class);

        return new VillageCollection(
            $district->villages()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\District  $district
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, District $district)
    {
        $this->authorize('create', Village::class);

        $this->validate($request, []);

        return Village::storeRecord($request, $district);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\District  $district
     * @param  \App\Models\Reference\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show(District $district, Village $village)
    {
        $this->authorize('show', $village);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\District  $district
     * @param  \App\Models\Reference\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district, Village $village)
    {
        $this->authorize('update', $village);

        $this->validate($request, []);

        return Village::updateRecord($request, $village);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\District  $district
     * @param  \App\Models\Reference\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district, Village $village)
    {
        $this->authorize('delete', $village);

        return Village::deleteRecord($village);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function restore(District $district, Village $village)
    {
        $this->authorize('restore', $village);

        return Village::restoreRecord($village);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Village $village
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(District $district, Village $village)
    {
        $this->authorize('destroy', $village);

        return Village::destroyRecord($village);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\District  $district
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, District $district)
    {
        $this->authorize('import', Village::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\District  $district
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, District $district)
    {
        $this->authorize('export', Village::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\District  $district
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, District $district)
    {
        $this->authorize('report', Village::class);

        // 
    }
}
