<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\WorkunitCollection;
use App\Models\Reference\Worktype;
use App\Models\Reference\Workunit;
use Illuminate\Http\Request;

class WorkunitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Worktype $worktype)
    {
        $this->authorize('view', Workunit::class);

        return new WorkunitCollection(
            $worktype->workunits()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Worktype $worktype)
    {
        $this->authorize('create', Workunit::class);

        $this->validate($request, []);

        return Workunit::storeRecord($request, $worktype);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Worktype  $worktype
     * @param  \App\Models\Reference\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function show(Worktype $worktype, Workunit $workunit)
    {
        $this->authorize('show', $workunit);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Worktype  $worktype
     * @param  \App\Models\Reference\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worktype $worktype, Workunit $workunit)
    {
        $this->authorize('update', $workunit);

        $this->validate($request, []);

        return Workunit::updateRecord($request, $workunit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Worktype  $worktype
     * @param  \App\Models\Reference\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worktype $worktype, Workunit $workunit)
    {
        $this->authorize('delete', $workunit);

        return Workunit::deleteRecord($workunit);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function restore(Worktype $worktype, Workunit $workunit)
    {
        $this->authorize('restore', $workunit);

        return Workunit::restoreRecord($workunit);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Workunit $workunit
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Worktype $worktype, Workunit $workunit)
    {
        $this->authorize('destroy', $workunit);

        return Workunit::destroyRecord($workunit);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Worktype $worktype)
    {
        $this->authorize('import', Workunit::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Worktype $worktype)
    {
        $this->authorize('export', Workunit::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Worktype  $worktype
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Worktype $worktype)
    {
        $this->authorize('report', Workunit::class);

        // 
    }
}
