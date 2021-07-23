<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\SectionmapCollection;
use App\Http\Resources\Reference\SectionmapResource;
use App\Models\Reference\Sectionmap;
use Illuminate\Http\Request;

class SectionmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Sectionmap::class);

        return new SectionmapCollection(
            Sectionmap::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Sectionmap::class);

        $this->validate($request, []);

        return Sectionmap::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function show(Sectionmap $sectionmap)
    {
        $this->authorize('show', $sectionmap);

        return new SectionmapResource($sectionmap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sectionmap $sectionmap)
    {
        $this->authorize('update', $sectionmap);

        $this->validate($request, []);

        return Sectionmap::updateRecord($request, $sectionmap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Sectionmap $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sectionmap $sectionmap)
    {
        $this->authorize('delete', $sectionmap);

        return Sectionmap::deleteRecord($sectionmap);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Sectionmap  $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function restore(Sectionmap $sectionmap)
    {
        $this->authorize('restore', $sectionmap);

        return Sectionmap::restoreRecord($sectionmap);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Sectionmap $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Sectionmap $sectionmap)
    {
        $this->authorize('destroy', $sectionmap);

        return Sectionmap::destroyRecord($sectionmap);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Sectionmap::class);

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
        $this->authorize('export', Sectionmap::class);

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
        $this->authorize('report', Sectionmap::class);

        // 
    }
}
