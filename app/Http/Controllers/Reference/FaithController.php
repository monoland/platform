<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\FaithCollection;
use App\Http\Resources\Reference\FaithResource;
use App\Models\Reference\Faith;
use Illuminate\Http\Request;

class FaithController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Faith::class);

        return new FaithCollection(
            Faith::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Faith::class);

        $this->validate($request, []);

        return Faith::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Faith  $faith
     * @return \Illuminate\Http\Response
     */
    public function show(Faith $faith)
    {
        $this->authorize('show', $faith);

        return new FaithResource($faith);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Faith  $faith
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faith $faith)
    {
        $this->authorize('update', $faith);

        $this->validate($request, []);

        return Faith::updateRecord($request, $faith);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Faith $faith
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faith $faith)
    {
        $this->authorize('delete', $faith);

        return Faith::deleteRecord($faith);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Faith  $faith
     * @return \Illuminate\Http\Response
     */
    public function restore(Faith $faith)
    {
        $this->authorize('restore', $faith);

        return Faith::restoreRecord($faith);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Faith $faith
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Faith $faith)
    {
        $this->authorize('destroy', $faith);

        return Faith::destroyRecord($faith);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Faith::class);

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
        $this->authorize('export', Faith::class);

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
        $this->authorize('report', Faith::class);

        // 
    }
}
