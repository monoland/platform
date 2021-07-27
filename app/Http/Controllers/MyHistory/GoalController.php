<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\GoalCollection;
use App\Http\Resources\MyHistory\GoalResource;
use App\Models\MyHistory\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Goal::class);

        return new GoalCollection(
            Goal::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Goal::class);

        $this->validate($request, []);

        return Goal::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
        $this->authorize('show', $goal);

        return new GoalResource($goal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        $this->authorize('update', $goal);

        $this->validate($request, []);

        return Goal::updateRecord($request, $goal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Goal $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        $this->authorize('delete', $goal);

        return Goal::deleteRecord($goal);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function restore(Goal $goal)
    {
        $this->authorize('restore', $goal);

        return Goal::restoreRecord($goal);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Goal $goal
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Goal $goal)
    {
        $this->authorize('destroy', $goal);

        return Goal::destroyRecord($goal);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Goal::class);

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
        $this->authorize('export', Goal::class);

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
        $this->authorize('report', Goal::class);

        // 
    }
}
