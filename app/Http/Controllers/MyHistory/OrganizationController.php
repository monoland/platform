<?php

namespace App\Http\Controllers\MyHistory;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyHistory\OrganizationCollection;
use App\Http\Resources\MyHistory\OrganizationResource;
use App\Models\MyHistory\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Organization::class);

        return new OrganizationCollection(
            Organization::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Organization::class);

        $this->validate($request, []);

        return Organization::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyHistory\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        $this->authorize('show', $organization);

        return new OrganizationResource($organization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyHistory\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $this->authorize('update', $organization);

        $this->validate($request, []);

        return Organization::updateRecord($request, $organization);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyHistory\Organization $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $this->authorize('delete', $organization);

        return Organization::deleteRecord($organization);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyHistory\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function restore(Organization $organization)
    {
        $this->authorize('restore', $organization);

        return Organization::restoreRecord($organization);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyHistory\Organization $organization
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Organization $organization)
    {
        $this->authorize('destroy', $organization);

        return Organization::destroyRecord($organization);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Organization::class);

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
        $this->authorize('export', Organization::class);

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
        $this->authorize('report', Organization::class);

        // 
    }
}
