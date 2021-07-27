<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\ParentsCollection;
use App\Http\Resources\MyHistory\ParentsResource;
use App\Models\MyHistory\Parents;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Parents::class);

        return new ParentsCollection(
            Parents::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Parents::class);

        $this->validate($request, []);

        return Parents::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function show(Parents $parents)
    {
        $this->authorize('show', $parents);

        return new ParentsResource($parents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parents $parents)
    {
        $this->authorize('update', $parents);

        $this->validate($request, []);

        return Parents::updateRecord($request, $parents);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Parents $parents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parents $parents)
    {
        $this->authorize('delete', $parents);

        return Parents::deleteRecord($parents);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function restore(Parents $parents)
    {
        $this->authorize('restore', $parents);

        return Parents::restoreRecord($parents);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Parents $parents
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Parents $parents)
    {
        $this->authorize('destroy', $parents);

        return Parents::destroyRecord($parents);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Parents::class);

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
        $this->authorize('export', Parents::class);

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
        $this->authorize('report', Parents::class);

        // 
    }
}
