<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\ExpertiseCollection;
use App\Models\Reference\Expertise;
use App\Models\Reference\Sector;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Sector $sector)
    {
        $this->authorize('view', Expertise::class);

        return new ExpertiseCollection(
            $sector->expertises()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sector $sector)
    {
        $this->authorize('create', Expertise::class);

        $this->validate($request, []);

        return Expertise::storeRecord($request, $sector);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Sector  $sector
     * @param  \App\Models\Reference\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector, Expertise $expertise)
    {
        $this->authorize('show', $expertise);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sector  $sector
     * @param  \App\Models\Reference\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector, Expertise $expertise)
    {
        $this->authorize('update', $expertise);

        $this->validate($request, []);

        return Expertise::updateRecord($request, $expertise);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Sector  $sector
     * @param  \App\Models\Reference\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector, Expertise $expertise)
    {
        $this->authorize('delete', $expertise);

        return Expertise::deleteRecord($expertise);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function restore(Sector $sector, Expertise $expertise)
    {
        $this->authorize('restore', $expertise);

        return Expertise::restoreRecord($expertise);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Expertise $expertise
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Sector $sector, Expertise $expertise)
    {
        $this->authorize('destroy', $expertise);

        return Expertise::destroyRecord($expertise);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Sector $sector)
    {
        $this->authorize('import', Expertise::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Sector $sector)
    {
        $this->authorize('export', Expertise::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Sector $sector)
    {
        $this->authorize('report', Expertise::class);

        // 
    }
}
