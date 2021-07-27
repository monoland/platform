<?php

namespace App\Http\Controllers\MyService;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyService\CouplecardCollection;
use App\Http\Resources\MyService\CouplecardResource;
use App\Models\MyService\Couplecard;
use Illuminate\Http\Request;

class CouplecardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Couplecard::class);

        return new CouplecardCollection(
            Couplecard::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Couplecard::class);

        $this->validate($request, []);

        return Couplecard::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyService\Couplecard  $couplecard
     * @return \Illuminate\Http\Response
     */
    public function show(Couplecard $couplecard)
    {
        $this->authorize('show', $couplecard);

        return new CouplecardResource($couplecard);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyService\Couplecard  $couplecard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Couplecard $couplecard)
    {
        $this->authorize('update', $couplecard);

        $this->validate($request, []);

        return Couplecard::updateRecord($request, $couplecard);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyService\Couplecard $couplecard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Couplecard $couplecard)
    {
        $this->authorize('delete', $couplecard);

        return Couplecard::deleteRecord($couplecard);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyService\Couplecard  $couplecard
     * @return \Illuminate\Http\Response
     */
    public function restore(Couplecard $couplecard)
    {
        $this->authorize('restore', $couplecard);

        return Couplecard::restoreRecord($couplecard);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyService\Couplecard $couplecard
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Couplecard $couplecard)
    {
        $this->authorize('destroy', $couplecard);

        return Couplecard::destroyRecord($couplecard);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Couplecard::class);

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
        $this->authorize('export', Couplecard::class);

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
        $this->authorize('report', Couplecard::class);

        // 
    }
}
