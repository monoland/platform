<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\PositiontypeCollection;
use App\Http\Resources\Reference\PositiontypeResource;
use App\Models\Reference\Positiontype;
use Illuminate\Http\Request;

class PositiontypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Positiontype::class);

        return new PositiontypeCollection(
            Positiontype::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Positiontype::class);

        $this->validate($request, []);

        return Positiontype::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Positiontype  $positiontype
     * @return \Illuminate\Http\Response
     */
    public function show(Positiontype $positiontype)
    {
        $this->authorize('show', $positiontype);

        return new PositiontypeResource($positiontype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Positiontype  $positiontype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Positiontype $positiontype)
    {
        $this->authorize('update', $positiontype);

        $this->validate($request, []);

        return Positiontype::updateRecord($request, $positiontype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Positiontype $positiontype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Positiontype $positiontype)
    {
        $this->authorize('delete', $positiontype);

        return Positiontype::deleteRecord($positiontype);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Positiontype  $positiontype
     * @return \Illuminate\Http\Response
     */
    public function restore(Positiontype $positiontype)
    {
        $this->authorize('restore', $positiontype);

        return Positiontype::restoreRecord($positiontype);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Positiontype $positiontype
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Positiontype $positiontype)
    {
        $this->authorize('destroy', $positiontype);

        return Positiontype::destroyRecord($positiontype);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Positiontype::class);

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
        $this->authorize('export', Positiontype::class);

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
        $this->authorize('report', Positiontype::class);

        // 
    }
}
