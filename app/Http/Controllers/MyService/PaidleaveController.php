<?php

namespace App\Http\Controllers\MyService;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyService\PaidleaveCollection;
use App\Http\Resources\MyService\PaidleaveResource;
use App\Models\MyService\Paidleave;
use Illuminate\Http\Request;

class PaidleaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Paidleave::class);

        return new PaidleaveCollection(
            Paidleave::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Paidleave::class);

        $this->validate($request, []);

        return Paidleave::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyService\Paidleave  $paidleave
     * @return \Illuminate\Http\Response
     */
    public function show(Paidleave $paidleave)
    {
        $this->authorize('show', $paidleave);

        return new PaidleaveResource($paidleave);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyService\Paidleave  $paidleave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paidleave $paidleave)
    {
        $this->authorize('update', $paidleave);

        $this->validate($request, []);

        return Paidleave::updateRecord($request, $paidleave);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyService\Paidleave $paidleave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paidleave $paidleave)
    {
        $this->authorize('delete', $paidleave);

        return Paidleave::deleteRecord($paidleave);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyService\Paidleave  $paidleave
     * @return \Illuminate\Http\Response
     */
    public function restore(Paidleave $paidleave)
    {
        $this->authorize('restore', $paidleave);

        return Paidleave::restoreRecord($paidleave);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyService\Paidleave $paidleave
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Paidleave $paidleave)
    {
        $this->authorize('destroy', $paidleave);

        return Paidleave::destroyRecord($paidleave);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Paidleave::class);

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
        $this->authorize('export', Paidleave::class);

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
        $this->authorize('report', Paidleave::class);

        // 
    }
}
