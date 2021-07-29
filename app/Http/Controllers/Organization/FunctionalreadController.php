<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization\Functional;
use App\Http\Resources\Organization\FunctionalreadCollection;
use App\Http\Resources\Organization\FunctionalreadShowResource;

class FunctionalreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Functional::class);

        return new FunctionalreadCollection(
            Functional::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Functional::class);

        $this->validate($request, []);

        return Functional::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Functional  $functional
     * @return \Illuminate\Http\Response
     */
    public function show(Functional $functional)
    {
        $this->authorize('show', $functional);

        return new FunctionalreadShowResource($functional);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functional  $functional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Functional $functional)
    {
        $this->authorize('update', $functional);

        $this->validate($request, []);

        return Functional::updateRecord($request, $functional);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Functional $functional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Functional $functional)
    {
        $this->authorize('delete', $functional);

        return Functional::deleteRecord($functional);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Functional  $functional
     * @return \Illuminate\Http\Response
     */
    public function restore(Functional $functional)
    {
        $this->authorize('restore', $functional);

        return Functional::restoreRecord($functional);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Functional $functional
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Functional $functional)
    {
        $this->authorize('destroy', $functional);

        return Functional::destroyRecord($functional);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Functional::class);

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
        $this->authorize('export', Functional::class);

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
        $this->authorize('report', Functional::class);

        //
    }
}
