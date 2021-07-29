<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\FunctionalmapCollection;
use App\Http\Resources\Organization\FunctionalmapResource;
use App\Models\Organization\Functionalmap;
use Illuminate\Http\Request;

class FunctionalmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Functionalmap::class);

        return new FunctionalmapCollection(
            Functionalmap::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Functionalmap::class);

        $this->validate($request, []);

        return Functionalmap::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function show(Functionalmap $functionalmap)
    {
        $this->authorize('show', $functionalmap);

        return new FunctionalmapResource($functionalmap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Functionalmap $functionalmap)
    {
        $this->authorize('update', $functionalmap);

        $this->validate($request, []);

        return Functionalmap::updateRecord($request, $functionalmap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Functionalmap $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Functionalmap $functionalmap)
    {
        $this->authorize('delete', $functionalmap);

        return Functionalmap::deleteRecord($functionalmap);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Functionalmap  $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function restore(Functionalmap $functionalmap)
    {
        $this->authorize('restore', $functionalmap);

        return Functionalmap::restoreRecord($functionalmap);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Functionalmap $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Functionalmap $functionalmap)
    {
        $this->authorize('destroy', $functionalmap);

        return Functionalmap::destroyRecord($functionalmap);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Functionalmap::class);

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
        $this->authorize('export', Functionalmap::class);

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
        $this->authorize('report', Functionalmap::class);

        // 
    }
}
