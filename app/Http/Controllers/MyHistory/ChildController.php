<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\ChildCollection;
use App\Http\Resources\MyHistory\ChildResource;
use App\Models\MyHistory\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Child::class);

        return new ChildCollection(
            Child::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Child::class);

        $this->validate($request, []);

        return Child::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
        $this->authorize('show', $child);

        return new ChildResource($child);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Child $child)
    {
        $this->authorize('update', $child);

        $this->validate($request, []);

        return Child::updateRecord($request, $child);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Child $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        $this->authorize('delete', $child);

        return Child::deleteRecord($child);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function restore(Child $child)
    {
        $this->authorize('restore', $child);

        return Child::restoreRecord($child);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Child $child
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Child $child)
    {
        $this->authorize('destroy', $child);

        return Child::destroyRecord($child);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Child::class);

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
        $this->authorize('export', Child::class);

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
        $this->authorize('report', Child::class);

        // 
    }
}
