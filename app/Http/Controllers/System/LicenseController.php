<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Resources\System\LicenseCollection;
use App\Http\Resources\System\LicenseResource;
use App\Models\System\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', License::class);

        return new LicenseCollection(
            License::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', License::class);

        $this->validate($request, []);

        return License::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System\License  $license
     * @return \Illuminate\Http\Response
     */
    public function show(License $license)
    {
        $this->authorize('show', $license);

        return new LicenseResource($license);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\License  $license
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, License $license)
    {
        $this->authorize('update', $license);

        $this->validate($request, []);

        return License::updateRecord($request, $license);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System\License $license
     * @return \Illuminate\Http\Response
     */
    public function destroy(License $license)
    {
        $this->authorize('delete', $license);

        return License::deleteRecord($license);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\System\License  $license
     * @return \Illuminate\Http\Response
     */
    public function restore(License $license)
    {
        $this->authorize('restore', License::class);

        return License::restoreRecord($license);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\System\License $license
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(License $license)
    {
        $this->authorize('destroy', License::class);

        return License::destroyRecord($license);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', License::class);

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
        $this->authorize('export', License::class);

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
        $this->authorize('report', License::class);

        //
    }
}
