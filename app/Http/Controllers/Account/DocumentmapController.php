<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\Account\DocumentmapCollection;
use App\Http\Resources\Account\DocumentmapResource;
use App\Models\Account\Documentmap;
use Illuminate\Http\Request;

class DocumentmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Documentmap::class);

        return new DocumentmapCollection(
            Documentmap::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Documentmap::class);

        $this->validate($request, []);

        return Documentmap::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\Documentmap  $documentmap
     * @return \Illuminate\Http\Response
     */
    public function show(Documentmap $documentmap)
    {
        $this->authorize('show', $documentmap);

        return new DocumentmapResource($documentmap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account\Documentmap  $documentmap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documentmap $documentmap)
    {
        $this->authorize('update', $documentmap);

        $this->validate($request, []);

        return Documentmap::updateRecord($request, $documentmap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\Documentmap $documentmap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentmap $documentmap)
    {
        $this->authorize('delete', $documentmap);

        return Documentmap::deleteRecord($documentmap);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Account\Documentmap  $documentmap
     * @return \Illuminate\Http\Response
     */
    public function restore(Documentmap $documentmap)
    {
        $this->authorize('restore', $documentmap);

        return Documentmap::restoreRecord($documentmap);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Account\Documentmap $documentmap
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Documentmap $documentmap)
    {
        $this->authorize('destroy', $documentmap);

        return Documentmap::destroyRecord($documentmap);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Documentmap::class);

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
        $this->authorize('export', Documentmap::class);

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
        $this->authorize('report', Documentmap::class);

        // 
    }
}
