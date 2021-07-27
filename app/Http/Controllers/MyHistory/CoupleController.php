<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\CoupleCollection;
use App\Http\Resources\MyHistory\CoupleResource;
use App\Models\MyHistory\Couple;
use Illuminate\Http\Request;

class CoupleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Couple::class);

        return new CoupleCollection(
            Couple::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Couple::class);

        $this->validate($request, []);

        return Couple::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function show(Couple $couple)
    {
        $this->authorize('show', $couple);

        return new CoupleResource($couple);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Couple $couple)
    {
        $this->authorize('update', $couple);

        $this->validate($request, []);

        return Couple::updateRecord($request, $couple);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Couple $couple
     * @return \Illuminate\Http\Response
     */
    public function destroy(Couple $couple)
    {
        $this->authorize('delete', $couple);

        return Couple::deleteRecord($couple);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function restore(Couple $couple)
    {
        $this->authorize('restore', $couple);

        return Couple::restoreRecord($couple);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Couple $couple
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Couple $couple)
    {
        $this->authorize('destroy', $couple);

        return Couple::destroyRecord($couple);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Couple::class);

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
        $this->authorize('export', Couple::class);

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
        $this->authorize('report', Couple::class);

        // 
    }
}
