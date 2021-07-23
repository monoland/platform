<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\GradeCollection;
use App\Models\Reference\Grade;
use App\Models\Reference\Level;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Level $level)
    {
        $this->authorize('view', Grade::class);

        return new GradeCollection(
            $level->grades()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Level $level)
    {
        $this->authorize('create', Grade::class);

        $this->validate($request, []);

        return Grade::storeRecord($request, $level);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Level  $level
     * @param  \App\Models\Reference\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level, Grade $grade)
    {
        $this->authorize('show', $grade);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Level  $level
     * @param  \App\Models\Reference\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level, Grade $grade)
    {
        $this->authorize('update', $grade);

        $this->validate($request, []);

        return Grade::updateRecord($request, $grade);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Level  $level
     * @param  \App\Models\Reference\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level, Grade $grade)
    {
        $this->authorize('delete', $grade);

        return Grade::deleteRecord($grade);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function restore(Level $level, Grade $grade)
    {
        $this->authorize('restore', $grade);

        return Grade::restoreRecord($grade);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Level $level, Grade $grade)
    {
        $this->authorize('destroy', $grade);

        return Grade::destroyRecord($grade);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Level $level)
    {
        $this->authorize('import', Grade::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Level $level)
    {
        $this->authorize('export', Grade::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Level $level)
    {
        $this->authorize('report', Grade::class);

        // 
    }
}
