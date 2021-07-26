<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\ReviewCollection;
use App\Http\Resources\MyHistory\ReviewResource;
use App\Models\MyHistory\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Review::class);

        return new ReviewCollection(
            Review::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Review::class);

        $this->validate($request, []);

        return Review::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $this->authorize('show', $review);

        return new ReviewResource($review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $this->validate($request, []);

        return Review::updateRecord($request, $review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);

        return Review::deleteRecord($review);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function restore(Review $review)
    {
        $this->authorize('restore', $review);

        return Review::restoreRecord($review);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Review $review
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Review $review)
    {
        $this->authorize('destroy', $review);

        return Review::destroyRecord($review);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Review::class);

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
        $this->authorize('export', Review::class);

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
        $this->authorize('report', Review::class);

        // 
    }
}
