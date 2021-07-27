<?php

namespace App\Http\Controllers\MyService;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyService\PayincreaseCollection;
use App\Http\Resources\MyService\PayincreaseResource;
use App\Models\MyService\Payincrease;
use Illuminate\Http\Request;

class PayincreaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Payincrease::class);

        return new PayincreaseCollection(
            Payincrease::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Payincrease::class);

        $this->validate($request, []);

        return Payincrease::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyService\Payincrease  $payincrease
     * @return \Illuminate\Http\Response
     */
    public function show(Payincrease $payincrease)
    {
        $this->authorize('show', $payincrease);

        return new PayincreaseResource($payincrease);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyService\Payincrease  $payincrease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payincrease $payincrease)
    {
        $this->authorize('update', $payincrease);

        $this->validate($request, []);

        return Payincrease::updateRecord($request, $payincrease);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyService\Payincrease $payincrease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payincrease $payincrease)
    {
        $this->authorize('delete', $payincrease);

        return Payincrease::deleteRecord($payincrease);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyService\Payincrease  $payincrease
     * @return \Illuminate\Http\Response
     */
    public function restore(Payincrease $payincrease)
    {
        $this->authorize('restore', $payincrease);

        return Payincrease::restoreRecord($payincrease);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyService\Payincrease $payincrease
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Payincrease $payincrease)
    {
        $this->authorize('destroy', $payincrease);

        return Payincrease::destroyRecord($payincrease);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Payincrease::class);

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
        $this->authorize('export', Payincrease::class);

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
        $this->authorize('report', Payincrease::class);

        // 
    }
}
