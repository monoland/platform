<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\SectionCollection;
use App\Http\Resources\Reference\SectionResource;
use App\Models\Reference\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Section::class);

        return new SectionCollection(
            Section::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Section::class);

        $this->validate($request, []);

        return Section::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        $this->authorize('show', $section);

        return new SectionResource($section);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $this->authorize('update', $section);

        $this->validate($request, []);

        return Section::updateRecord($request, $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Section $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $this->authorize('delete', $section);

        return Section::deleteRecord($section);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function restore(Section $section)
    {
        $this->authorize('restore', $section);

        return Section::restoreRecord($section);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Section $section
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Section $section)
    {
        $this->authorize('destroy', $section);

        return Section::destroyRecord($section);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Section::class);

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
        $this->authorize('export', Section::class);

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
        $this->authorize('report', Section::class);

        // 
    }
}
