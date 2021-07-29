<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\FunctionalgradeCollection;
use App\Models\Organization\Functionalgrade;
use App\Models\Organization\Functionalstage;
use Illuminate\Http\Request;

class FunctionalgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Functionalstage $functionalstage)
    {
        $this->authorize('view', Functionalgrade::class);

        return new FunctionalgradeCollection(
            $functionalstage->functionalgrades()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Functionalstage $functionalstage)
    {
        $this->authorize('create', Functionalgrade::class);

        $this->validate($request, []);

        return Functionalgrade::storeRecord($request, $functionalstage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @param  \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return \Illuminate\Http\Response
     */
    public function show(Functionalstage $functionalstage, Functionalgrade $functionalgrade)
    {
        $this->authorize('show', $functionalgrade);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @param  \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Functionalstage $functionalstage, Functionalgrade $functionalgrade)
    {
        $this->authorize('update', $functionalgrade);

        $this->validate($request, []);

        return Functionalgrade::updateRecord($request, $functionalgrade);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @param  \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Functionalstage $functionalstage, Functionalgrade $functionalgrade)
    {
        $this->authorize('delete', $functionalgrade);

        return Functionalgrade::deleteRecord($functionalgrade);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Functionalgrade  $functionalgrade
     * @return \Illuminate\Http\Response
     */
    public function restore(Functionalstage $functionalstage, Functionalgrade $functionalgrade)
    {
        $this->authorize('restore', $functionalgrade);

        return Functionalgrade::restoreRecord($functionalgrade);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Functionalgrade $functionalgrade
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Functionalstage $functionalstage, Functionalgrade $functionalgrade)
    {
        $this->authorize('destroy', $functionalgrade);

        return Functionalgrade::destroyRecord($functionalgrade);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Functionalstage $functionalstage)
    {
        $this->authorize('import', Functionalgrade::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Functionalstage $functionalstage)
    {
        $this->authorize('export', Functionalgrade::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalstage  $functionalstage
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Functionalstage $functionalstage)
    {
        $this->authorize('report', Functionalgrade::class);

        // 
    }
}
