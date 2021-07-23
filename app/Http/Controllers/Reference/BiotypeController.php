<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\BiotypeCollection;
use App\Http\Resources\Reference\BiotypeResource;
use App\Models\Reference\Biotype;
use Illuminate\Http\Request;

class BiotypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Biotype::class);

        return new BiotypeCollection(
            Biotype::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Biotype::class);

        $this->validate($request, []);

        return Biotype::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Biotype  $biotype
     * @return \Illuminate\Http\Response
     */
    public function show(Biotype $biotype)
    {
        $this->authorize('show', $biotype);

        return new BiotypeResource($biotype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Biotype  $biotype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biotype $biotype)
    {
        $this->authorize('update', $biotype);

        $this->validate($request, []);

        return Biotype::updateRecord($request, $biotype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Biotype $biotype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biotype $biotype)
    {
        $this->authorize('delete', $biotype);

        return Biotype::deleteRecord($biotype);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Biotype  $biotype
     * @return \Illuminate\Http\Response
     */
    public function restore(Biotype $biotype)
    {
        $this->authorize('restore', $biotype);

        return Biotype::restoreRecord($biotype);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Biotype $biotype
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Biotype $biotype)
    {
        $this->authorize('destroy', $biotype);

        return Biotype::destroyRecord($biotype);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Biotype::class);

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
        $this->authorize('export', Biotype::class);

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
        $this->authorize('report', Biotype::class);

        // 
    }
}
