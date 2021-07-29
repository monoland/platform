<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\WorkunitypeCollection;
use App\Http\Resources\Organization\WorkunitypeResource;
use App\Models\Organization\Workunitype;
use Illuminate\Http\Request;

class WorkunitypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Workunitype::class);

        return new WorkunitypeCollection(
            Workunitype::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Workunitype::class);

        $this->validate($request, []);

        return Workunitype::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Workunitype  $workunitype
     * @return \Illuminate\Http\Response
     */
    public function show(Workunitype $workunitype)
    {
        $this->authorize('show', $workunitype);

        return new WorkunitypeResource($workunitype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Workunitype  $workunitype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workunitype $workunitype)
    {
        $this->authorize('update', $workunitype);

        $this->validate($request, []);

        return Workunitype::updateRecord($request, $workunitype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Workunitype $workunitype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workunitype $workunitype)
    {
        $this->authorize('delete', $workunitype);

        return Workunitype::deleteRecord($workunitype);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Workunitype  $workunitype
     * @return \Illuminate\Http\Response
     */
    public function restore(Workunitype $workunitype)
    {
        $this->authorize('restore', $workunitype);

        return Workunitype::restoreRecord($workunitype);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Workunitype $workunitype
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Workunitype $workunitype)
    {
        $this->authorize('destroy', $workunitype);

        return Workunitype::destroyRecord($workunitype);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Workunitype::class);

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
        $this->authorize('export', Workunitype::class);

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
        $this->authorize('report', Workunitype::class);

        // 
    }
}
