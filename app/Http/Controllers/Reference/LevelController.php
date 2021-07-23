<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\LevelCollection;
use App\Http\Resources\Reference\LevelResource;
use App\Models\Reference\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Level::class);

        return new LevelCollection(
            Level::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Level::class);

        $this->validate($request, []);

        return Level::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        $this->authorize('show', $level);

        return new LevelResource($level);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $this->authorize('update', $level);

        $this->validate($request, []);

        return Level::updateRecord($request, $level);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Level $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $this->authorize('delete', $level);

        return Level::deleteRecord($level);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function restore(Level $level)
    {
        $this->authorize('restore', $level);

        return Level::restoreRecord($level);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Level $level
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Level $level)
    {
        $this->authorize('destroy', $level);

        return Level::destroyRecord($level);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Level::class);

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
        $this->authorize('export', Level::class);

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
        $this->authorize('report', Level::class);

        // 
    }
}
