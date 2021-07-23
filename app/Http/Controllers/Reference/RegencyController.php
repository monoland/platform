<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\RegencyCollection;
use App\Models\Reference\Province;
use App\Models\Reference\Regency;
use Illuminate\Http\Request;

class RegencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Province $province)
    {
        $this->authorize('view', Regency::class);

        return new RegencyCollection(
            $province->regencys()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Province $province)
    {
        $this->authorize('create', Regency::class);

        $this->validate($request, []);

        return Regency::storeRecord($request, $province);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Province  $province
     * @param  \App\Models\Reference\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province, Regency $regency)
    {
        $this->authorize('show', $regency);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Province  $province
     * @param  \App\Models\Reference\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province, Regency $regency)
    {
        $this->authorize('update', $regency);

        $this->validate($request, []);

        return Regency::updateRecord($request, $regency);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Province  $province
     * @param  \App\Models\Reference\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province, Regency $regency)
    {
        $this->authorize('delete', $regency);

        return Regency::deleteRecord($regency);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Regency  $regency
     * @return \Illuminate\Http\Response
     */
    public function restore(Province $province, Regency $regency)
    {
        $this->authorize('restore', $regency);

        return Regency::restoreRecord($regency);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Regency $regency
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Province $province, Regency $regency)
    {
        $this->authorize('destroy', $regency);

        return Regency::destroyRecord($regency);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Province $province)
    {
        $this->authorize('import', Regency::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Province $province)
    {
        $this->authorize('export', Regency::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Province $province)
    {
        $this->authorize('report', Regency::class);

        // 
    }
}
