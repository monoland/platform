<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization\Formation;
use App\Http\Resources\Organization\AnomalyCollection;
use App\Http\Resources\Organization\AnomalyShowResource;

class AnomalyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Formation::class);

        return new AnomalyCollection(
            Formation::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Formation::class);

        $this->validate($request, []);

        return Formation::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        $this->authorize('show', $formation);

        return new AnomalyShowResource($formation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        $this->authorize('update', $formation);

        $this->validate($request, []);

        return Formation::updateRecord($request, $formation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        $this->authorize('delete', $formation);

        return Formation::deleteRecord($formation);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function restore(Formation $formation)
    {
        $this->authorize('restore', $formation);

        return Formation::restoreRecord($formation);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Formation $formation)
    {
        $this->authorize('destroy', $formation);

        return Formation::destroyRecord($formation);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Formation::class);

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
        $this->authorize('export', Formation::class);

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
        $this->authorize('report', Formation::class);

        //
    }
}
