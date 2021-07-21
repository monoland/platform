<?php

namespace App\Http\Controllers\MyAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MyAccount\Announcement;
use App\Http\Resources\MyAccount\AnnouncementCollection;
use App\Http\Resources\MyAccount\AnnouncementShowResource;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Announcement::class);

        return new AnnouncementCollection(
            $request->user()->announcements()->filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Announcement::class);

        $this->validate($request, []);

        return Announcement::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyAccount\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Announcement $announcement)
    {
        $this->authorize('show', $announcement);

        if ($request->has('mode') && $request->mode !== 'default') {
            $this->authorize('restore', $announcement);
        }

        return new AnnouncementShowResource($announcement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyAccount\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $this->authorize('update', $announcement);

        $this->validate($request, []);

        return Announcement::updateRecord($request, $announcement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyAccount\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $this->authorize('delete', $announcement);

        return Announcement::deleteRecord($announcement);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyAccount\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function restore(Announcement $announcement)
    {
        $this->authorize('restore', $announcement);

        return Announcement::restoreRecord($announcement);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyAccount\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Announcement $announcement)
    {
        $this->authorize('destroy', $announcement);

        return Announcement::destroyRecord($announcement);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Announcement::class);

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
        $this->authorize('export', Announcement::class);

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
        $this->authorize('report', Announcement::class);

        //
    }
}
