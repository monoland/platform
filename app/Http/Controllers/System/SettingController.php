<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Resources\System\SettingCollection;
use App\Http\Resources\System\SettingResource;
use App\Models\System\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Setting::class);

        return new SettingCollection(
            Setting::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Setting::class);

        $this->validate($request, []);

        return Setting::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        $this->authorize('show', $setting);

        return new SettingResource($setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $this->authorize('update', $setting);

        $this->validate($request, []);

        return Setting::updateRecord($request, $setting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $this->authorize('delete', $setting);

        return Setting::deleteRecord($setting);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\System\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function restore(Setting $setting)
    {
        $this->authorize('restore', Setting::class);

        return Setting::restoreRecord($setting);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\System\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Setting $setting)
    {
        $this->authorize('destroy', Setting::class);

        return Setting::destroyRecord($setting);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Setting::class);

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
        $this->authorize('export', Setting::class);

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
        $this->authorize('report', Setting::class);

        //
    }
}
