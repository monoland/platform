<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\EdulevelCollection;
use App\Http\Resources\Reference\EdulevelResource;
use App\Models\Reference\Edulevel;
use Illuminate\Http\Request;

class EdulevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Edulevel::class);

        return new EdulevelCollection(
            Edulevel::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Edulevel::class);

        $this->validate($request, []);

        return Edulevel::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function show(Edulevel $edulevel)
    {
        $this->authorize('show', $edulevel);

        return new EdulevelResource($edulevel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edulevel $edulevel)
    {
        $this->authorize('update', $edulevel);

        $this->validate($request, []);

        return Edulevel::updateRecord($request, $edulevel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Edulevel $edulevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edulevel $edulevel)
    {
        $this->authorize('delete', $edulevel);

        return Edulevel::deleteRecord($edulevel);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function restore(Edulevel $edulevel)
    {
        $this->authorize('restore', $edulevel);

        return Edulevel::restoreRecord($edulevel);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Edulevel $edulevel
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Edulevel $edulevel)
    {
        $this->authorize('destroy', $edulevel);

        return Edulevel::destroyRecord($edulevel);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Edulevel::class);

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
        $this->authorize('export', Edulevel::class);

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
        $this->authorize('report', Edulevel::class);

        // 
    }
}
