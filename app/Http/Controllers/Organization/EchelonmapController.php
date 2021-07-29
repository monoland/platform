<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\EchelonmapCollection;
use App\Http\Resources\Organization\EchelonmapResource;
use App\Models\Organization\Echelonmap;
use Illuminate\Http\Request;

class EchelonmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Echelonmap::class);

        return new EchelonmapCollection(
            Echelonmap::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Echelonmap::class);

        $this->validate($request, []);

        return Echelonmap::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function show(Echelonmap $echelonmap)
    {
        $this->authorize('show', $echelonmap);

        return new EchelonmapResource($echelonmap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Echelonmap $echelonmap)
    {
        $this->authorize('update', $echelonmap);

        $this->validate($request, []);

        return Echelonmap::updateRecord($request, $echelonmap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Echelonmap $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echelonmap $echelonmap)
    {
        $this->authorize('delete', $echelonmap);

        return Echelonmap::deleteRecord($echelonmap);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Echelonmap  $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function restore(Echelonmap $echelonmap)
    {
        $this->authorize('restore', $echelonmap);

        return Echelonmap::restoreRecord($echelonmap);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Echelonmap $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Echelonmap $echelonmap)
    {
        $this->authorize('destroy', $echelonmap);

        return Echelonmap::destroyRecord($echelonmap);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Echelonmap::class);

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
        $this->authorize('export', Echelonmap::class);

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
        $this->authorize('report', Echelonmap::class);

        // 
    }
}
