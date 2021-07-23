<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\SectorCollection;
use App\Http\Resources\Reference\SectorResource;
use App\Models\Reference\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Sector::class);

        return new SectorCollection(
            Sector::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Sector::class);

        $this->validate($request, []);

        return Sector::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        $this->authorize('show', $sector);

        return new SectorResource($sector);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        $this->authorize('update', $sector);

        $this->validate($request, []);

        return Sector::updateRecord($request, $sector);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Sector $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        $this->authorize('delete', $sector);

        return Sector::deleteRecord($sector);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function restore(Sector $sector)
    {
        $this->authorize('restore', $sector);

        return Sector::restoreRecord($sector);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Sector $sector
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Sector $sector)
    {
        $this->authorize('destroy', $sector);

        return Sector::destroyRecord($sector);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Sector::class);

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
        $this->authorize('export', Sector::class);

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
        $this->authorize('report', Sector::class);

        // 
    }
}
