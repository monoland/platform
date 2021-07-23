<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\GenderCollection;
use App\Http\Resources\Reference\GenderResource;
use App\Models\Reference\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Gender::class);

        return new GenderCollection(
            Gender::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Gender::class);

        $this->validate($request, []);

        return Gender::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        $this->authorize('show', $gender);

        return new GenderResource($gender);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gender $gender)
    {
        $this->authorize('update', $gender);

        $this->validate($request, []);

        return Gender::updateRecord($request, $gender);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Gender $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $gender)
    {
        $this->authorize('delete', $gender);

        return Gender::deleteRecord($gender);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function restore(Gender $gender)
    {
        $this->authorize('restore', $gender);

        return Gender::restoreRecord($gender);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Gender $gender
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Gender $gender)
    {
        $this->authorize('destroy', $gender);

        return Gender::destroyRecord($gender);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Gender::class);

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
        $this->authorize('export', Gender::class);

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
        $this->authorize('report', Gender::class);

        // 
    }
}
