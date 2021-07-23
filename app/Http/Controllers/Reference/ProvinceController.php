<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\ProvinceCollection;
use App\Http\Resources\Reference\ProvinceResource;
use App\Models\Reference\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Province::class);

        return new ProvinceCollection(
            Province::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Province::class);

        $this->validate($request, []);

        return Province::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        $this->authorize('show', $province);

        return new ProvinceResource($province);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        $this->authorize('update', $province);

        $this->validate($request, []);

        return Province::updateRecord($request, $province);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Province $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        $this->authorize('delete', $province);

        return Province::deleteRecord($province);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function restore(Province $province)
    {
        $this->authorize('restore', $province);

        return Province::restoreRecord($province);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Province $province
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Province $province)
    {
        $this->authorize('destroy', $province);

        return Province::destroyRecord($province);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Province::class);

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
        $this->authorize('export', Province::class);

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
        $this->authorize('report', Province::class);

        // 
    }
}
