<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\SectionRoomCollection;
use App\Models\Reference\Section;
use App\Models\Reference\SectionRoom;
use Illuminate\Http\Request;

class SectionRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Section $section)
    {
        $this->authorize('view', SectionRoom::class);

        return new SectionRoomCollection(
            $section->sectionRooms()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Section $section)
    {
        $this->authorize('create', SectionRoom::class);

        $this->validate($request, []);

        return SectionRoom::storeRecord($request, $section);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Section  $section
     * @param  \App\Models\Reference\SectionRoom  $sectionRoom
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section, SectionRoom $sectionRoom)
    {
        $this->authorize('show', $sectionRoom);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Section  $section
     * @param  \App\Models\Reference\SectionRoom  $sectionRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section, SectionRoom $sectionRoom)
    {
        $this->authorize('update', $sectionRoom);

        $this->validate($request, []);

        return SectionRoom::updateRecord($request, $sectionRoom);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Section  $section
     * @param  \App\Models\Reference\SectionRoom  $sectionRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section, SectionRoom $sectionRoom)
    {
        $this->authorize('delete', $sectionRoom);

        return SectionRoom::deleteRecord($sectionRoom);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\SectionRoom  $sectionRoom
     * @return \Illuminate\Http\Response
     */
    public function restore(Section $section, SectionRoom $sectionRoom)
    {
        $this->authorize('restore', $sectionRoom);

        return SectionRoom::restoreRecord($sectionRoom);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\SectionRoom $sectionRoom
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Section $section, SectionRoom $sectionRoom)
    {
        $this->authorize('destroy', $sectionRoom);

        return SectionRoom::destroyRecord($sectionRoom);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Section $section)
    {
        $this->authorize('import', SectionRoom::class);

        //
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Section $section)
    {
        $this->authorize('export', SectionRoom::class);

        //
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Section $section)
    {
        $this->authorize('report', SectionRoom::class);

        //
    }
}
