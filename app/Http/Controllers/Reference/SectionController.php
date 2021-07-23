<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\SectionCollection;
use App\Models\Reference\Section;
use App\Models\Reference\Sectionmap;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Sectionmap $sectionmap)
    {
        $this->authorize('view', Section::class);

        return new SectionCollection(
            $sectionmap->sections()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sectionmap $sectionmap)
    {
        $this->authorize('create', Section::class);

        $this->validate($request, []);

        return Section::storeRecord($request, $sectionmap);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Sectionmap $sectionmap, Section $section)
    {
        $this->authorize('show', $section);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sectionmap $sectionmap, Section $section)
    {
        $this->authorize('update', $section);

        $this->validate($request, []);

        return Section::updateRecord($request, $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sectionmap $sectionmap, Section $section)
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
    public function restore(Sectionmap $sectionmap, Section $section)
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
    public function forceDelete(Sectionmap $sectionmap, Section $section)
    {
        $this->authorize('destroy', $section);

        return Section::destroyRecord($section);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Sectionmap $sectionmap)
    {
        $this->authorize('import', Section::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Sectionmap $sectionmap)
    {
        $this->authorize('export', Section::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Sectionmap  $sectionmap
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Sectionmap $sectionmap)
    {
        $this->authorize('report', Section::class);

        // 
    }
}
