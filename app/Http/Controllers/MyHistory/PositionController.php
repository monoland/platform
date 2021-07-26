<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\PositionCollection;
use App\Http\Resources\MyHistory\PositionResource;
use App\Models\MyHistory\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Position::class);

        return new PositionCollection(
            Position::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Position::class);

        $this->validate($request, []);

        return Position::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        $this->authorize('show', $position);

        return new PositionResource($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $this->authorize('update', $position);

        $this->validate($request, []);

        return Position::updateRecord($request, $position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Position $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $this->authorize('delete', $position);

        return Position::deleteRecord($position);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function restore(Position $position)
    {
        $this->authorize('restore', $position);

        return Position::restoreRecord($position);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Position $position
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Position $position)
    {
        $this->authorize('destroy', $position);

        return Position::destroyRecord($position);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Position::class);

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
        $this->authorize('export', Position::class);

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
        $this->authorize('report', Position::class);

        // 
    }
}
