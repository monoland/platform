<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\BiomodeCollection;
use App\Http\Resources\Reference\BiomodeResource;
use App\Models\Reference\Biomode;
use Illuminate\Http\Request;

class BiomodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Biomode::class);

        return new BiomodeCollection(
            Biomode::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Biomode::class);

        $this->validate($request, []);

        return Biomode::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Biomode  $biomode
     * @return \Illuminate\Http\Response
     */
    public function show(Biomode $biomode)
    {
        $this->authorize('show', $biomode);

        return new BiomodeResource($biomode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Biomode  $biomode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biomode $biomode)
    {
        $this->authorize('update', $biomode);

        $this->validate($request, []);

        return Biomode::updateRecord($request, $biomode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Biomode $biomode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biomode $biomode)
    {
        $this->authorize('delete', $biomode);

        return Biomode::deleteRecord($biomode);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Biomode  $biomode
     * @return \Illuminate\Http\Response
     */
    public function restore(Biomode $biomode)
    {
        $this->authorize('restore', $biomode);

        return Biomode::restoreRecord($biomode);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Biomode $biomode
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Biomode $biomode)
    {
        $this->authorize('destroy', $biomode);

        return Biomode::destroyRecord($biomode);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Biomode::class);

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
        $this->authorize('export', Biomode::class);

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
        $this->authorize('report', Biomode::class);

        // 
    }
}
