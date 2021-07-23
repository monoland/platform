<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\DistrictCollection;
use App\Models\Reference\District;
use App\Models\Reference\Regency;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Regency $regency)
    {
        $this->authorize('view', District::class);

        return new DistrictCollection(
            $regency->districts()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Regency $regency)
    {
        $this->authorize('create', District::class);

        $this->validate($request, []);

        return District::storeRecord($request, $regency);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Regency  $regency
     * @param  \App\Models\Reference\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(Regency $regency, District $district)
    {
        $this->authorize('show', $district);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Regency  $regency
     * @param  \App\Models\Reference\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regency $regency, District $district)
    {
        $this->authorize('update', $district);

        $this->validate($request, []);

        return District::updateRecord($request, $district);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Regency  $regency
     * @param  \App\Models\Reference\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regency $regency, District $district)
    {
        $this->authorize('delete', $district);

        return District::deleteRecord($district);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\District  $district
     * @return \Illuminate\Http\Response
     */
    public function restore(Regency $regency, District $district)
    {
        $this->authorize('restore', $district);

        return District::restoreRecord($district);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\District $district
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Regency $regency, District $district)
    {
        $this->authorize('destroy', $district);

        return District::destroyRecord($district);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Regency $regency)
    {
        $this->authorize('import', District::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Regency $regency)
    {
        $this->authorize('export', District::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Regency $regency)
    {
        $this->authorize('report', District::class);

        // 
    }
}
