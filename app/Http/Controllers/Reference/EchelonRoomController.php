<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\EchelonRoomCollection;
use App\Models\Reference\Echelon;
use App\Models\Reference\EchelonRoom;
use Illuminate\Http\Request;

class EchelonRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Echelon $echelon)
    {
        $this->authorize('view', EchelonRoom::class);

        return new EchelonRoomCollection(
            $echelon->echelonRooms()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Echelon $echelon)
    {
        $this->authorize('create', EchelonRoom::class);

        $this->validate($request, []);

        return EchelonRoom::storeRecord($request, $echelon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Echelon  $echelon
     * @param  \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return \Illuminate\Http\Response
     */
    public function show(Echelon $echelon, EchelonRoom $echelonRoom)
    {
        $this->authorize('show', $echelonRoom);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Echelon  $echelon
     * @param  \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Echelon $echelon, EchelonRoom $echelonRoom)
    {
        $this->authorize('update', $echelonRoom);

        $this->validate($request, []);

        return EchelonRoom::updateRecord($request, $echelonRoom);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Echelon  $echelon
     * @param  \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echelon $echelon, EchelonRoom $echelonRoom)
    {
        $this->authorize('delete', $echelonRoom);

        return EchelonRoom::deleteRecord($echelonRoom);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\EchelonRoom  $echelonRoom
     * @return \Illuminate\Http\Response
     */
    public function restore(Echelon $echelon, EchelonRoom $echelonRoom)
    {
        $this->authorize('restore', $echelonRoom);

        return EchelonRoom::restoreRecord($echelonRoom);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\EchelonRoom $echelonRoom
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Echelon $echelon, EchelonRoom $echelonRoom)
    {
        $this->authorize('destroy', $echelonRoom);

        return EchelonRoom::destroyRecord($echelonRoom);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Echelon $echelon)
    {
        $this->authorize('import', EchelonRoom::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Echelon $echelon)
    {
        $this->authorize('export', EchelonRoom::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Echelon $echelon)
    {
        $this->authorize('report', EchelonRoom::class);

        // 
    }
}
