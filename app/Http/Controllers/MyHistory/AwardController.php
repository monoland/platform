<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\AwardCollection;
use App\Http\Resources\MyHistory\AwardResource;
use App\Models\MyHistory\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Award::class);

        return new AwardCollection(
            Award::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Award::class);

        $this->validate($request, []);

        return Award::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        $this->authorize('show', $award);

        return new AwardResource($award);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {
        $this->authorize('update', $award);

        $this->validate($request, []);

        return Award::updateRecord($request, $award);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Award $award
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $award)
    {
        $this->authorize('delete', $award);

        return Award::deleteRecord($award);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function restore(Award $award)
    {
        $this->authorize('restore', $award);

        return Award::restoreRecord($award);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Award $award
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Award $award)
    {
        $this->authorize('destroy', $award);

        return Award::destroyRecord($award);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Award::class);

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
        $this->authorize('export', Award::class);

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
        $this->authorize('report', Award::class);

        // 
    }
}
