<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\StructuralCollection;
use App\Http\Resources\Reference\StructuralResource;
use App\Models\Reference\Structural;
use Illuminate\Http\Request;

class StructuralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Structural::class);

        return new StructuralCollection(
            Structural::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Structural::class);

        $this->validate($request, []);

        return Structural::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Structural  $structural
     * @return \Illuminate\Http\Response
     */
    public function show(Structural $structural)
    {
        $this->authorize('show', $structural);

        return new StructuralResource($structural);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Structural  $structural
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Structural $structural)
    {
        $this->authorize('update', $structural);

        $this->validate($request, []);

        return Structural::updateRecord($request, $structural);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Structural $structural
     * @return \Illuminate\Http\Response
     */
    public function destroy(Structural $structural)
    {
        $this->authorize('delete', $structural);

        return Structural::deleteRecord($structural);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Structural  $structural
     * @return \Illuminate\Http\Response
     */
    public function restore(Structural $structural)
    {
        $this->authorize('restore', $structural);

        return Structural::restoreRecord($structural);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Structural $structural
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Structural $structural)
    {
        $this->authorize('destroy', $structural);

        return Structural::destroyRecord($structural);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Structural::class);

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
        $this->authorize('export', Structural::class);

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
        $this->authorize('report', Structural::class);

        // 
    }
}
