<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\PostypeCollection;
use App\Models\Reference\Postype;
use App\Models\Reference\Spot;
use Illuminate\Http\Request;

class PostypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Spot $spot)
    {
        $this->authorize('view', Postype::class);

        return new PostypeCollection(
            $spot->postypes()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Spot $spot)
    {
        $this->authorize('create', Postype::class);

        $this->validate($request, []);

        return Postype::storeRecord($request, $spot);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Spot  $spot
     * @param  \App\Models\Reference\Postype  $postype
     * @return \Illuminate\Http\Response
     */
    public function show(Spot $spot, Postype $postype)
    {
        $this->authorize('show', $postype);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Spot  $spot
     * @param  \App\Models\Reference\Postype  $postype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spot $spot, Postype $postype)
    {
        $this->authorize('update', $postype);

        $this->validate($request, []);

        return Postype::updateRecord($request, $postype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Spot  $spot
     * @param  \App\Models\Reference\Postype  $postype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spot $spot, Postype $postype)
    {
        $this->authorize('delete', $postype);

        return Postype::deleteRecord($postype);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Postype  $postype
     * @return \Illuminate\Http\Response
     */
    public function restore(Spot $spot, Postype $postype)
    {
        $this->authorize('restore', $postype);

        return Postype::restoreRecord($postype);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Postype $postype
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Spot $spot, Postype $postype)
    {
        $this->authorize('destroy', $postype);

        return Postype::destroyRecord($postype);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Spot $spot)
    {
        $this->authorize('import', Postype::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Spot $spot)
    {
        $this->authorize('export', Postype::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Spot $spot)
    {
        $this->authorize('report', Postype::class);

        // 
    }
}
