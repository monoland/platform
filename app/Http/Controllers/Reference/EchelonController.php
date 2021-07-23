<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\EchelonCollection;
use App\Http\Resources\Reference\EchelonResource;
use App\Models\Reference\Echelon;
use Illuminate\Http\Request;

class EchelonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Echelon::class);

        return new EchelonCollection(
            Echelon::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Echelon::class);

        $this->validate($request, []);

        return Echelon::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function show(Echelon $echelon)
    {
        $this->authorize('show', $echelon);

        return new EchelonResource($echelon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Echelon $echelon)
    {
        $this->authorize('update', $echelon);

        $this->validate($request, []);

        return Echelon::updateRecord($request, $echelon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Echelon $echelon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echelon $echelon)
    {
        $this->authorize('delete', $echelon);

        return Echelon::deleteRecord($echelon);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function restore(Echelon $echelon)
    {
        $this->authorize('restore', $echelon);

        return Echelon::restoreRecord($echelon);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Echelon $echelon
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Echelon $echelon)
    {
        $this->authorize('destroy', $echelon);

        return Echelon::destroyRecord($echelon);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Echelon::class);

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
        $this->authorize('export', Echelon::class);

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
        $this->authorize('report', Echelon::class);

        // 
    }
}
