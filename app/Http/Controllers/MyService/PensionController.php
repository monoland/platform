<?php

namespace App\Http\Controllers\MyService;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyService\PensionCollection;
use App\Http\Resources\MyService\PensionResource;
use App\Models\MyService\Pension;
use Illuminate\Http\Request;

class PensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Pension::class);

        return new PensionCollection(
            Pension::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Pension::class);

        $this->validate($request, []);

        return Pension::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyService\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function show(Pension $pension)
    {
        $this->authorize('show', $pension);

        return new PensionResource($pension);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyService\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pension $pension)
    {
        $this->authorize('update', $pension);

        $this->validate($request, []);

        return Pension::updateRecord($request, $pension);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyService\Pension $pension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pension $pension)
    {
        $this->authorize('delete', $pension);

        return Pension::deleteRecord($pension);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyService\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function restore(Pension $pension)
    {
        $this->authorize('restore', $pension);

        return Pension::restoreRecord($pension);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyService\Pension $pension
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Pension $pension)
    {
        $this->authorize('destroy', $pension);

        return Pension::destroyRecord($pension);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Pension::class);

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
        $this->authorize('export', Pension::class);

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
        $this->authorize('report', Pension::class);

        // 
    }
}
