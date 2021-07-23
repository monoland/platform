<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\WorktypeCollection;
use App\Http\Resources\Reference\WorktypeResource;
use App\Models\Reference\Worktype;
use Illuminate\Http\Request;

class WorktypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Worktype::class);

        return new WorktypeCollection(
            Worktype::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Worktype::class);

        $this->validate($request, []);

        return Worktype::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return \Illuminate\Http\Response
     */
    public function show(Worktype $worktype)
    {
        $this->authorize('show', $worktype);

        return new WorktypeResource($worktype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worktype $worktype)
    {
        $this->authorize('update', $worktype);

        $this->validate($request, []);

        return Worktype::updateRecord($request, $worktype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Worktype $worktype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worktype $worktype)
    {
        $this->authorize('delete', $worktype);

        return Worktype::deleteRecord($worktype);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Worktype  $worktype
     * @return \Illuminate\Http\Response
     */
    public function restore(Worktype $worktype)
    {
        $this->authorize('restore', $worktype);

        return Worktype::restoreRecord($worktype);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Worktype $worktype
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Worktype $worktype)
    {
        $this->authorize('destroy', $worktype);

        return Worktype::destroyRecord($worktype);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Worktype::class);

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
        $this->authorize('export', Worktype::class);

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
        $this->authorize('report', Worktype::class);

        // 
    }
}
