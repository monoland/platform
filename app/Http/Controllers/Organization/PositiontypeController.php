<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization\Positionmap;
use App\Models\Organization\Positiontype;
use App\Http\Resources\Organization\PositiontypeCollection;
use App\Http\Resources\Organization\PositiontypeShowResource;

class PositiontypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Positionmap $positionmap)
    {
        $this->authorize('view', Positiontype::class);

        return new PositiontypeCollection(
            $positionmap->positiontypes()->with(['positionmap'])->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Positionmap $positionmap)
    {
        $this->authorize('create', Positiontype::class);

        $this->validate($request, []);

        return Positiontype::storeRecord($request, $positionmap);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @param  \App\Models\Organization\Positiontype  $positiontype
     * @return \Illuminate\Http\Response
     */
    public function show(Positionmap $positionmap, Positiontype $positiontype)
    {
        $this->authorize('show', $positiontype);

        return new PositiontypeShowResource($positiontype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @param  \App\Models\Organization\Positiontype  $positiontype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Positionmap $positionmap, Positiontype $positiontype)
    {
        $this->authorize('update', $positiontype);

        $this->validate($request, []);

        return Positiontype::updateRecord($request, $positiontype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @param  \App\Models\Organization\Positiontype  $positiontype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Positionmap $positionmap, Positiontype $positiontype)
    {
        $this->authorize('delete', $positiontype);

        return Positiontype::deleteRecord($positiontype);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Positiontype  $positiontype
     * @return \Illuminate\Http\Response
     */
    public function restore(Positionmap $positionmap, Positiontype $positiontype)
    {
        $this->authorize('restore', $positiontype);

        return Positiontype::restoreRecord($positiontype);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Positiontype $positiontype
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Positionmap $positionmap, Positiontype $positiontype)
    {
        $this->authorize('destroy', $positiontype);

        return Positiontype::destroyRecord($positiontype);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Positionmap $positionmap)
    {
        $this->authorize('import', Positiontype::class);

        //
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Positionmap $positionmap)
    {
        $this->authorize('export', Positiontype::class);

        //
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Positionmap  $positionmap
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Positionmap $positionmap)
    {
        $this->authorize('report', Positiontype::class);

        //
    }
}
