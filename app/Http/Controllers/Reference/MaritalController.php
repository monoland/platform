<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\MaritalCollection;
use App\Http\Resources\Reference\MaritalResource;
use App\Models\Reference\Marital;
use Illuminate\Http\Request;

class MaritalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Marital::class);

        return new MaritalCollection(
            Marital::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Marital::class);

        $this->validate($request, []);

        return Marital::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function show(Marital $marital)
    {
        $this->authorize('show', $marital);

        return new MaritalResource($marital);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marital $marital)
    {
        $this->authorize('update', $marital);

        $this->validate($request, []);

        return Marital::updateRecord($request, $marital);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Marital $marital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marital $marital)
    {
        $this->authorize('delete', $marital);

        return Marital::deleteRecord($marital);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Marital  $marital
     * @return \Illuminate\Http\Response
     */
    public function restore(Marital $marital)
    {
        $this->authorize('restore', $marital);

        return Marital::restoreRecord($marital);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Marital $marital
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Marital $marital)
    {
        $this->authorize('destroy', $marital);

        return Marital::destroyRecord($marital);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Marital::class);

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
        $this->authorize('export', Marital::class);

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
        $this->authorize('report', Marital::class);

        // 
    }
}
