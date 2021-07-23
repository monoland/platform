<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\PostmapCollection;
use App\Http\Resources\Reference\PostmapResource;
use App\Models\Reference\Postmap;
use Illuminate\Http\Request;

class PostmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Postmap::class);

        return new PostmapCollection(
            Postmap::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Postmap::class);

        $this->validate($request, []);

        return Postmap::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Postmap  $postmap
     * @return \Illuminate\Http\Response
     */
    public function show(Postmap $postmap)
    {
        $this->authorize('show', $postmap);

        return new PostmapResource($postmap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Postmap  $postmap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postmap $postmap)
    {
        $this->authorize('update', $postmap);

        $this->validate($request, []);

        return Postmap::updateRecord($request, $postmap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Postmap $postmap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postmap $postmap)
    {
        $this->authorize('delete', $postmap);

        return Postmap::deleteRecord($postmap);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Postmap  $postmap
     * @return \Illuminate\Http\Response
     */
    public function restore(Postmap $postmap)
    {
        $this->authorize('restore', $postmap);

        return Postmap::restoreRecord($postmap);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Postmap $postmap
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Postmap $postmap)
    {
        $this->authorize('destroy', $postmap);

        return Postmap::destroyRecord($postmap);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Postmap::class);

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
        $this->authorize('export', Postmap::class);

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
        $this->authorize('report', Postmap::class);

        // 
    }
}
