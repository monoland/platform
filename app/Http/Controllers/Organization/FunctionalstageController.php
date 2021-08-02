<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization\Functionalstage;
use App\Http\Resources\Organization\FunctionalstageCollection;
use App\Http\Resources\Organization\FunctionalstageShowResource;

class FunctionalstageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Functionalstage::class);

        return new FunctionalstageCollection(
            Functionalstage::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Functionalstage::class);

        $this->validate($request, []);

        return Functionalstage::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function show(Functionalstage $functionalstage)
    {
        $this->authorize('show', $functionalstage);

        return new FunctionalstageShowResource($functionalstage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Functionalstage $functionalstage)
    {
        $this->authorize('update', $functionalstage);

        $this->validate($request, []);

        return Functionalstage::updateRecord($request, $functionalstage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Functionalstage $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Functionalstage $functionalstage)
    {
        $this->authorize('delete', $functionalstage);

        return Functionalstage::deleteRecord($functionalstage);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Functionalstage  $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function restore(Functionalstage $functionalstage)
    {
        $this->authorize('restore', $functionalstage);

        return Functionalstage::restoreRecord($functionalstage);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Functionalstage $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Functionalstage $functionalstage)
    {
        $this->authorize('destroy', $functionalstage);

        return Functionalstage::destroyRecord($functionalstage);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Functionalstage::class);

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
        $this->authorize('export', Functionalstage::class);

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
        $this->authorize('report', Functionalstage::class);

        //
    }
}
