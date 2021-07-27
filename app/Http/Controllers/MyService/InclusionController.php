<?php

namespace App\Http\Controllers\MyService;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyService\InclusionCollection;
use App\Http\Resources\MyService\InclusionResource;
use App\Models\MyService\Inclusion;
use Illuminate\Http\Request;

class InclusionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Inclusion::class);

        return new InclusionCollection(
            Inclusion::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Inclusion::class);

        $this->validate($request, []);

        return Inclusion::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyService\Inclusion  $inclusion
     * @return \Illuminate\Http\Response
     */
    public function show(Inclusion $inclusion)
    {
        $this->authorize('show', $inclusion);

        return new InclusionResource($inclusion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyService\Inclusion  $inclusion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inclusion $inclusion)
    {
        $this->authorize('update', $inclusion);

        $this->validate($request, []);

        return Inclusion::updateRecord($request, $inclusion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyService\Inclusion $inclusion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inclusion $inclusion)
    {
        $this->authorize('delete', $inclusion);

        return Inclusion::deleteRecord($inclusion);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyService\Inclusion  $inclusion
     * @return \Illuminate\Http\Response
     */
    public function restore(Inclusion $inclusion)
    {
        $this->authorize('restore', $inclusion);

        return Inclusion::restoreRecord($inclusion);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyService\Inclusion $inclusion
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Inclusion $inclusion)
    {
        $this->authorize('destroy', $inclusion);

        return Inclusion::destroyRecord($inclusion);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Inclusion::class);

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
        $this->authorize('export', Inclusion::class);

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
        $this->authorize('report', Inclusion::class);

        // 
    }
}
