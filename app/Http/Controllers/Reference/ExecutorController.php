<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\ExecutorCollection;
use App\Http\Resources\Reference\ExecutorResource;
use App\Models\Reference\Executor;
use Illuminate\Http\Request;

class ExecutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Executor::class);

        return new ExecutorCollection(
            Executor::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Executor::class);

        $this->validate($request, []);

        return Executor::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Executor  $executor
     * @return \Illuminate\Http\Response
     */
    public function show(Executor $executor)
    {
        $this->authorize('show', $executor);

        return new ExecutorResource($executor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Executor  $executor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Executor $executor)
    {
        $this->authorize('update', $executor);

        $this->validate($request, []);

        return Executor::updateRecord($request, $executor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Executor $executor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Executor $executor)
    {
        $this->authorize('delete', $executor);

        return Executor::deleteRecord($executor);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Executor  $executor
     * @return \Illuminate\Http\Response
     */
    public function restore(Executor $executor)
    {
        $this->authorize('restore', $executor);

        return Executor::restoreRecord($executor);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Executor $executor
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Executor $executor)
    {
        $this->authorize('destroy', $executor);

        return Executor::destroyRecord($executor);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Executor::class);

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
        $this->authorize('export', Executor::class);

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
        $this->authorize('report', Executor::class);

        // 
    }
}
