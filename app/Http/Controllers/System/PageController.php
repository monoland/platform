<?php

namespace App\Http\Controllers\System;

use App\Models\System\Page;
use Illuminate\Http\Request;
use App\Models\System\Module;
use App\Http\Controllers\Controller;
use App\Http\Resources\System\PageCollection;
use App\Http\Resources\System\PageShowResource;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Module $module)
    {
        $this->authorize('view', Page::class);

        return new PageCollection(
            $module->pages()->withDepth()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Module $module)
    {
        $this->authorize('create', Page::class);

        $this->validate($request, []);

        return Page::storeRecord($request, $module);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System\Module  $module
     * @param  \App\Models\System\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module, Page $page)
    {
        $this->authorize('show', $page);

        return new PageShowResource($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @param  \App\Models\System\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module, Page $page)
    {
        $this->authorize('update', $page);

        $this->validate($request, []);

        return Page::updateRecord($request, $page, $module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System\Module  $module
     * @param  \App\Models\System\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module, Page $page)
    {
        $this->authorize('delete', $page);

        return Page::deleteRecord($page);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\System\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function restore(Module $module, Page $page)
    {
        $this->authorize('restore', Page::class);

        return Page::restoreRecord($page);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\System\Page $page
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Module $module, Page $page)
    {
        $this->authorize('destroy', Page::class);

        return Page::destroyRecord($page);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Module $module)
    {
        $this->authorize('import', Page::class);

        //
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Module $module)
    {
        $this->authorize('export', Page::class);

        //
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Module $module)
    {
        $this->authorize('report', Page::class);

        //
    }

    public function combo(Request $request, Module $module)
    {
        return response()->json([
            'combos' => [
                'parents' => $module->pages()->fetchCombo()
            ]
        ]);
    }
}
