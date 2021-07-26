<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\StatusCollection;
use App\Http\Resources\MyHistory\StatusResource;
use App\Models\MyHistory\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Status::class);

        return new StatusCollection(
            Status::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Status::class);

        $this->validate($request, []);

        return Status::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        $this->authorize('show', $status);

        return new StatusResource($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $this->authorize('update', $status);

        $this->validate($request, []);

        return Status::updateRecord($request, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Status $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $this->authorize('delete', $status);

        return Status::deleteRecord($status);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function restore(Status $status)
    {
        $this->authorize('restore', $status);

        return Status::restoreRecord($status);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Status $status
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Status $status)
    {
        $this->authorize('destroy', $status);

        return Status::destroyRecord($status);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Status::class);

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
        $this->authorize('export', Status::class);

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
        $this->authorize('report', Status::class);

        // 
    }
}
