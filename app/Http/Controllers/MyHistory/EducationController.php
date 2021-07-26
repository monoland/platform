<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\EducationCollection;
use App\Http\Resources\MyHistory\EducationResource;
use App\Models\MyHistory\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Education::class);

        return new EducationCollection(
            Education::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Education::class);

        $this->validate($request, []);

        return Education::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        $this->authorize('show', $education);

        return new EducationResource($education);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $this->authorize('update', $education);

        $this->validate($request, []);

        return Education::updateRecord($request, $education);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Education $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $this->authorize('delete', $education);

        return Education::deleteRecord($education);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function restore(Education $education)
    {
        $this->authorize('restore', $education);

        return Education::restoreRecord($education);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Education $education
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Education $education)
    {
        $this->authorize('destroy', $education);

        return Education::destroyRecord($education);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Education::class);

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
        $this->authorize('export', Education::class);

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
        $this->authorize('report', Education::class);

        // 
    }
}
