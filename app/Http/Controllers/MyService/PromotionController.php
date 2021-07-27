<?php

namespace App\Http\Controllers\MyService;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyService\PromotionCollection;
use App\Http\Resources\MyService\PromotionResource;
use App\Models\MyService\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Promotion::class);

        return new PromotionCollection(
            Promotion::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Promotion::class);

        $this->validate($request, []);

        return Promotion::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyService\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        $this->authorize('show', $promotion);

        return new PromotionResource($promotion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyService\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $this->authorize('update', $promotion);

        $this->validate($request, []);

        return Promotion::updateRecord($request, $promotion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyService\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $this->authorize('delete', $promotion);

        return Promotion::deleteRecord($promotion);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyService\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function restore(Promotion $promotion)
    {
        $this->authorize('restore', $promotion);

        return Promotion::restoreRecord($promotion);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyService\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Promotion $promotion)
    {
        $this->authorize('destroy', $promotion);

        return Promotion::destroyRecord($promotion);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Promotion::class);

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
        $this->authorize('export', Promotion::class);

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
        $this->authorize('report', Promotion::class);

        // 
    }
}
