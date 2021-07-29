<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\PositionmapCollection;
use App\Http\Resources\Organization\PositionmapResource;
use App\Models\Organization\Positionmap;
use Illuminate\Http\Request;

class PositionmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Positionmap::class);

        return new PositionmapCollection(
            Positionmap::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Positionmap::class);

        $this->validate($request, []);

        return Positionmap::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return \Illuminate\Http\Response
     */
    public function show(Positionmap $positionmap)
    {
        $this->authorize('show', $positionmap);

        return new PositionmapResource($positionmap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Positionmap $positionmap)
    {
        $this->authorize('update', $positionmap);

        $this->validate($request, []);

        return Positionmap::updateRecord($request, $positionmap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Positionmap $positionmap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Positionmap $positionmap)
    {
        $this->authorize('delete', $positionmap);

        return Positionmap::deleteRecord($positionmap);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Positionmap  $positionmap
     * @return \Illuminate\Http\Response
     */
    public function restore(Positionmap $positionmap)
    {
        $this->authorize('restore', $positionmap);

        return Positionmap::restoreRecord($positionmap);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Positionmap $positionmap
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Positionmap $positionmap)
    {
        $this->authorize('destroy', $positionmap);

        return Positionmap::destroyRecord($positionmap);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Positionmap::class);

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
        $this->authorize('export', Positionmap::class);

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
        $this->authorize('report', Positionmap::class);

        // 
    }
}
