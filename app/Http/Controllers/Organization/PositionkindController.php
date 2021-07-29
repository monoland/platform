<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\PositionkindCollection;
use App\Http\Resources\Organization\PositionkindResource;
use App\Models\Organization\Positionkind;
use Illuminate\Http\Request;

class PositionkindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Positionkind::class);

        return new PositionkindCollection(
            Positionkind::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Positionkind::class);

        $this->validate($request, []);

        return Positionkind::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Positionkind  $positionkind
     * @return \Illuminate\Http\Response
     */
    public function show(Positionkind $positionkind)
    {
        $this->authorize('show', $positionkind);

        return new PositionkindResource($positionkind);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Positionkind  $positionkind
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Positionkind $positionkind)
    {
        $this->authorize('update', $positionkind);

        $this->validate($request, []);

        return Positionkind::updateRecord($request, $positionkind);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Positionkind $positionkind
     * @return \Illuminate\Http\Response
     */
    public function destroy(Positionkind $positionkind)
    {
        $this->authorize('delete', $positionkind);

        return Positionkind::deleteRecord($positionkind);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Positionkind  $positionkind
     * @return \Illuminate\Http\Response
     */
    public function restore(Positionkind $positionkind)
    {
        $this->authorize('restore', $positionkind);

        return Positionkind::restoreRecord($positionkind);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Positionkind $positionkind
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Positionkind $positionkind)
    {
        $this->authorize('destroy', $positionkind);

        return Positionkind::destroyRecord($positionkind);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Positionkind::class);

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
        $this->authorize('export', Positionkind::class);

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
        $this->authorize('report', Positionkind::class);

        // 
    }
}
