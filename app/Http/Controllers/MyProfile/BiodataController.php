<?php

namespace App\Http\Controllers\MyProfile;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyProfile\BiodataCollection;
use App\Http\Resources\MyProfile\BiodataResource;
use App\Models\MyProfile\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Biodata::class);

        return new BiodataCollection(
            Biodata::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Biodata::class);

        $this->validate($request, []);

        return Biodata::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyProfile\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show(Biodata $biodata)
    {
        $this->authorize('show', $biodata);

        return new BiodataResource($biodata);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyProfile\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biodata $biodata)
    {
        $this->authorize('update', $biodata);

        $this->validate($request, []);

        return Biodata::updateRecord($request, $biodata);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyProfile\Biodata $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biodata $biodata)
    {
        $this->authorize('delete', $biodata);

        return Biodata::deleteRecord($biodata);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyProfile\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function restore(Biodata $biodata)
    {
        $this->authorize('restore', $biodata);

        return Biodata::restoreRecord($biodata);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyProfile\Biodata $biodata
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Biodata $biodata)
    {
        $this->authorize('destroy', $biodata);

        return Biodata::destroyRecord($biodata);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Biodata::class);

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
        $this->authorize('export', Biodata::class);

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
        $this->authorize('report', Biodata::class);

        // 
    }
}
