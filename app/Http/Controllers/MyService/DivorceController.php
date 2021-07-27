<?php

namespace App\Http\Controllers\MyService;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyService\DivorceCollection;
use App\Http\Resources\MyService\DivorceResource;
use App\Models\MyService\Divorce;
use Illuminate\Http\Request;

class DivorceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Divorce::class);

        return new DivorceCollection(
            Divorce::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Divorce::class);

        $this->validate($request, []);

        return Divorce::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyService\Divorce  $divorce
     * @return \Illuminate\Http\Response
     */
    public function show(Divorce $divorce)
    {
        $this->authorize('show', $divorce);

        return new DivorceResource($divorce);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyService\Divorce  $divorce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divorce $divorce)
    {
        $this->authorize('update', $divorce);

        $this->validate($request, []);

        return Divorce::updateRecord($request, $divorce);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyService\Divorce $divorce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divorce $divorce)
    {
        $this->authorize('delete', $divorce);

        return Divorce::deleteRecord($divorce);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyService\Divorce  $divorce
     * @return \Illuminate\Http\Response
     */
    public function restore(Divorce $divorce)
    {
        $this->authorize('restore', $divorce);

        return Divorce::restoreRecord($divorce);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyService\Divorce $divorce
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Divorce $divorce)
    {
        $this->authorize('destroy', $divorce);

        return Divorce::destroyRecord($divorce);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Divorce::class);

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
        $this->authorize('export', Divorce::class);

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
        $this->authorize('report', Divorce::class);

        // 
    }
}
