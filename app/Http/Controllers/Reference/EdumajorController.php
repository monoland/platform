<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\EdumajorCollection;
use App\Http\Resources\Reference\EdumajorResource;
use App\Models\Reference\Edumajor;
use Illuminate\Http\Request;

class EdumajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Edumajor::class);

        return new EdumajorCollection(
            Edumajor::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Edumajor::class);

        $this->validate($request, []);

        return Edumajor::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Edumajor  $edumajor
     * @return \Illuminate\Http\Response
     */
    public function show(Edumajor $edumajor)
    {
        $this->authorize('show', $edumajor);

        return new EdumajorResource($edumajor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Edumajor  $edumajor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edumajor $edumajor)
    {
        $this->authorize('update', $edumajor);

        $this->validate($request, []);

        return Edumajor::updateRecord($request, $edumajor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Edumajor $edumajor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edumajor $edumajor)
    {
        $this->authorize('delete', $edumajor);

        return Edumajor::deleteRecord($edumajor);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Edumajor  $edumajor
     * @return \Illuminate\Http\Response
     */
    public function restore(Edumajor $edumajor)
    {
        $this->authorize('restore', $edumajor);

        return Edumajor::restoreRecord($edumajor);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Edumajor $edumajor
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Edumajor $edumajor)
    {
        $this->authorize('destroy', $edumajor);

        return Edumajor::destroyRecord($edumajor);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Edumajor::class);

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
        $this->authorize('export', Edumajor::class);

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
        $this->authorize('report', Edumajor::class);

        // 
    }
}
