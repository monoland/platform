<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyAccount\NotificationCollection;
use App\Http\Resources\MyAccount\NotificationResource;
use App\Models\MyAccount\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Notification::class);

        return new NotificationCollection(
            $request->user()->notifications()->filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Notification::class);

        $this->validate($request, []);

        return Notification::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyAccount\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        $this->authorize('show', $notification);

        return new NotificationResource($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyAccount\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $this->authorize('update', $notification);

        $this->validate($request, []);

        return Notification::updateRecord($request, $notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyAccount\Notification $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $this->authorize('delete', $notification);

        return Notification::deleteRecord($notification);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyAccount\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function restore(Notification $notification)
    {
        $this->authorize('restore', Notification::class);

        return Notification::restoreRecord($notification);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyAccount\Notification $notification
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Notification $notification)
    {
        $this->authorize('destroy', Notification::class);

        return Notification::destroyRecord($notification);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Notification::class);

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
        $this->authorize('export', Notification::class);

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
        $this->authorize('report', Notification::class);

        //
    }
}
