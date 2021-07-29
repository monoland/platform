<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\FunctionalexpertCollection;
use App\Models\Organization\Functionalexpert;
use App\Models\Organization\Functionalmap;
use Illuminate\Http\Request;

class FunctionalexpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Functionalmap $functionalmap)
    {
        $this->authorize('view', Functionalexpert::class);

        return new FunctionalexpertCollection(
            $functionalmap->functionalexperts()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Functionalmap $functionalmap)
    {
        $this->authorize('create', Functionalexpert::class);

        $this->validate($request, []);

        return Functionalexpert::storeRecord($request, $functionalmap);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @param  \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return \Illuminate\Http\Response
     */
    public function show(Functionalmap $functionalmap, Functionalexpert $functionalexpert)
    {
        $this->authorize('show', $functionalexpert);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @param  \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Functionalmap $functionalmap, Functionalexpert $functionalexpert)
    {
        $this->authorize('update', $functionalexpert);

        $this->validate($request, []);

        return Functionalexpert::updateRecord($request, $functionalexpert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @param  \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Functionalmap $functionalmap, Functionalexpert $functionalexpert)
    {
        $this->authorize('delete', $functionalexpert);

        return Functionalexpert::deleteRecord($functionalexpert);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Functionalexpert  $functionalexpert
     * @return \Illuminate\Http\Response
     */
    public function restore(Functionalmap $functionalmap, Functionalexpert $functionalexpert)
    {
        $this->authorize('restore', $functionalexpert);

        return Functionalexpert::restoreRecord($functionalexpert);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Functionalexpert $functionalexpert
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Functionalmap $functionalmap, Functionalexpert $functionalexpert)
    {
        $this->authorize('destroy', $functionalexpert);

        return Functionalexpert::destroyRecord($functionalexpert);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Functionalmap $functionalmap)
    {
        $this->authorize('import', Functionalexpert::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Functionalmap $functionalmap)
    {
        $this->authorize('export', Functionalexpert::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Functionalmap  $functionalmap
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Functionalmap $functionalmap)
    {
        $this->authorize('report', Functionalexpert::class);

        // 
    }
}
