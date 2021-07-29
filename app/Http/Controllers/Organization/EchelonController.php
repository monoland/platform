<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\EchelonCollection;
use App\Models\Organization\Echelon;
use App\Models\Organization\Echelonmap;
use Illuminate\Http\Request;

class EchelonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Echelonmap $echelonmap)
    {
        $this->authorize('view', Echelon::class);

        return new EchelonCollection(
            $echelonmap->echelons()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Echelonmap $echelonmap)
    {
        $this->authorize('create', Echelon::class);

        $this->validate($request, []);

        return Echelon::storeRecord($request, $echelonmap);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @param  \App\Models\Organization\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function show(Echelonmap $echelonmap, Echelon $echelon)
    {
        $this->authorize('show', $echelon);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @param  \App\Models\Organization\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Echelonmap $echelonmap, Echelon $echelon)
    {
        $this->authorize('update', $echelon);

        $this->validate($request, []);

        return Echelon::updateRecord($request, $echelon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @param  \App\Models\Organization\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echelonmap $echelonmap, Echelon $echelon)
    {
        $this->authorize('delete', $echelon);

        return Echelon::deleteRecord($echelon);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Echelon  $echelon
     * @return \Illuminate\Http\Response
     */
    public function restore(Echelonmap $echelonmap, Echelon $echelon)
    {
        $this->authorize('restore', $echelon);

        return Echelon::restoreRecord($echelon);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Echelon $echelon
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Echelonmap $echelonmap, Echelon $echelon)
    {
        $this->authorize('destroy', $echelon);

        return Echelon::destroyRecord($echelon);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Echelonmap $echelonmap)
    {
        $this->authorize('import', Echelon::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Echelonmap $echelonmap)
    {
        $this->authorize('export', Echelon::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Echelonmap  $echelonmap
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Echelonmap $echelonmap)
    {
        $this->authorize('report', Echelon::class);

        // 
    }
}
