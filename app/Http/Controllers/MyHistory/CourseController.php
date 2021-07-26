<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\CourseCollection;
use App\Http\Resources\MyHistory\CourseResource;
use App\Models\MyHistory\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Course::class);

        return new CourseCollection(
            Course::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Course::class);

        $this->validate($request, []);

        return Course::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $this->authorize('show', $course);

        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('update', $course);

        $this->validate($request, []);

        return Course::updateRecord($request, $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        return Course::deleteRecord($course);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function restore(Course $course)
    {
        $this->authorize('restore', $course);

        return Course::restoreRecord($course);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Course $course
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Course $course)
    {
        $this->authorize('destroy', $course);

        return Course::destroyRecord($course);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Course::class);

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
        $this->authorize('export', Course::class);

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
        $this->authorize('report', Course::class);

        // 
    }
}
