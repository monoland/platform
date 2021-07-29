<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\CompositionCollection;
use App\Models\Organization\Composition;
use App\Models\Organization\Workunit;
use Illuminate\Http\Request;

class CompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Workunit $workunit)
    {
        $this->authorize('view', Composition::class);

        return new CompositionCollection(
            $workunit->compositions()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Workunit $workunit)
    {
        $this->authorize('create', Composition::class);

        $this->validate($request, []);

        return Composition::storeRecord($request, $workunit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Workunit  $workunit
     * @param  \App\Models\Organization\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function show(Workunit $workunit, Composition $composition)
    {
        $this->authorize('show', $composition);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Workunit  $workunit
     * @param  \App\Models\Organization\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workunit $workunit, Composition $composition)
    {
        $this->authorize('update', $composition);

        $this->validate($request, []);

        return Composition::updateRecord($request, $composition);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Workunit  $workunit
     * @param  \App\Models\Organization\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workunit $workunit, Composition $composition)
    {
        $this->authorize('delete', $composition);

        return Composition::deleteRecord($composition);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function restore(Workunit $workunit, Composition $composition)
    {
        $this->authorize('restore', $composition);

        return Composition::restoreRecord($composition);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Composition $composition
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Workunit $workunit, Composition $composition)
    {
        $this->authorize('destroy', $composition);

        return Composition::destroyRecord($composition);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Workunit $workunit)
    {
        $this->authorize('import', Composition::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Workunit $workunit)
    {
        $this->authorize('export', Composition::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Workunit  $workunit
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Workunit $workunit)
    {
        $this->authorize('report', Composition::class);

        // 
    }
}
