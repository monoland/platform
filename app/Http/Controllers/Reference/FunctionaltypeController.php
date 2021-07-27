<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\FunctionaltypeCollection;
use App\Http\Resources\Reference\FunctionaltypeResource;
use App\Models\Reference\Functionaltype;
use Illuminate\Http\Request;

class FunctionaltypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Functionaltype::class);

        return new FunctionaltypeCollection(
            Functionaltype::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Functionaltype::class);

        $this->validate($request, []);

        return Functionaltype::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Functionaltype  $functionaltype
     * @return \Illuminate\Http\Response
     */
    public function show(Functionaltype $functionaltype)
    {
        $this->authorize('show', $functionaltype);

        return new FunctionaltypeResource($functionaltype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Functionaltype  $functionaltype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Functionaltype $functionaltype)
    {
        $this->authorize('update', $functionaltype);

        $this->validate($request, []);

        return Functionaltype::updateRecord($request, $functionaltype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Functionaltype $functionaltype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Functionaltype $functionaltype)
    {
        $this->authorize('delete', $functionaltype);

        return Functionaltype::deleteRecord($functionaltype);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Functionaltype  $functionaltype
     * @return \Illuminate\Http\Response
     */
    public function restore(Functionaltype $functionaltype)
    {
        $this->authorize('restore', $functionaltype);

        return Functionaltype::restoreRecord($functionaltype);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Functionaltype $functionaltype
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Functionaltype $functionaltype)
    {
        $this->authorize('destroy', $functionaltype);

        return Functionaltype::destroyRecord($functionaltype);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Functionaltype::class);

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
        $this->authorize('export', Functionaltype::class);

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
        $this->authorize('report', Functionaltype::class);

        // 
    }
}
