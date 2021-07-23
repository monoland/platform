<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\BiopostCollection;
use App\Http\Resources\Reference\BiopostResource;
use App\Models\Reference\Biopost;
use Illuminate\Http\Request;

class BiopostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Biopost::class);

        return new BiopostCollection(
            Biopost::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Biopost::class);

        $this->validate($request, []);

        return Biopost::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Biopost  $biopost
     * @return \Illuminate\Http\Response
     */
    public function show(Biopost $biopost)
    {
        $this->authorize('show', $biopost);

        return new BiopostResource($biopost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Biopost  $biopost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biopost $biopost)
    {
        $this->authorize('update', $biopost);

        $this->validate($request, []);

        return Biopost::updateRecord($request, $biopost);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Biopost $biopost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biopost $biopost)
    {
        $this->authorize('delete', $biopost);

        return Biopost::deleteRecord($biopost);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Biopost  $biopost
     * @return \Illuminate\Http\Response
     */
    public function restore(Biopost $biopost)
    {
        $this->authorize('restore', $biopost);

        return Biopost::restoreRecord($biopost);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Biopost $biopost
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Biopost $biopost)
    {
        $this->authorize('destroy', $biopost);

        return Biopost::destroyRecord($biopost);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Biopost::class);

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
        $this->authorize('export', Biopost::class);

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
        $this->authorize('report', Biopost::class);

        // 
    }
}
