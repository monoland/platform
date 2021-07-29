<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization\Workunit;
use App\Http\Resources\Organization\WorkunitreadCollection;
use App\Http\Resources\Organization\WorkunitreadShowResource;

class WorkunitreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Workunit::class);

        return new WorkunitreadCollection(
            Workunit::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Workunit::class);

        $this->validate($request, []);

        return Workunit::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function show(Workunit $workunit)
    {
        $this->authorize('show', $workunit);

        return new WorkunitreadShowResource($workunit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workunit $workunit)
    {
        $this->authorize('update', $workunit);

        $this->validate($request, []);

        return Workunit::updateRecord($request, $workunit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Workunit $workunit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workunit $workunit)
    {
        $this->authorize('delete', $workunit);

        return Workunit::deleteRecord($workunit);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function restore(Workunit $workunit)
    {
        $this->authorize('restore', $workunit);

        return Workunit::restoreRecord($workunit);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Workunit $workunit
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Workunit $workunit)
    {
        $this->authorize('destroy', $workunit);

        return Workunit::destroyRecord($workunit);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Workunit::class);

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
        $this->authorize('export', Workunit::class);

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
        $this->authorize('report', Workunit::class);

        //
    }
}
