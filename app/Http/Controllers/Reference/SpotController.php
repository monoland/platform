<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\SpotCollection;
use App\Http\Resources\Reference\SpotResource;
use App\Models\Reference\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Spot::class);

        return new SpotCollection(
            Spot::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Spot::class);

        $this->validate($request, []);

        return Spot::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function show(Spot $spot)
    {
        $this->authorize('show', $spot);

        return new SpotResource($spot);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spot $spot)
    {
        $this->authorize('update', $spot);

        $this->validate($request, []);

        return Spot::updateRecord($request, $spot);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Spot $spot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spot $spot)
    {
        $this->authorize('delete', $spot);

        return Spot::deleteRecord($spot);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function restore(Spot $spot)
    {
        $this->authorize('restore', $spot);

        return Spot::restoreRecord($spot);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Spot $spot
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Spot $spot)
    {
        $this->authorize('destroy', $spot);

        return Spot::destroyRecord($spot);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Spot::class);

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
        $this->authorize('export', Spot::class);

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
        $this->authorize('report', Spot::class);

        // 
    }
}
