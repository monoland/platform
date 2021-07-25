<?php

namespace App\Http\Controllers\MyProfile;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyProfile\DocumentCollection;
use App\Http\Resources\MyProfile\DocumentResource;
use App\Models\MyProfile\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Document::class);

        return new DocumentCollection(
            Document::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Document::class);

        $this->validate($request, []);

        return Document::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyProfile\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $this->authorize('show', $document);

        return new DocumentResource($document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyProfile\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $this->authorize('update', $document);

        $this->validate($request, []);

        return Document::updateRecord($request, $document);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyProfile\Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $this->authorize('delete', $document);

        return Document::deleteRecord($document);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyProfile\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function restore(Document $document)
    {
        $this->authorize('restore', $document);

        return Document::restoreRecord($document);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyProfile\Document $document
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Document $document)
    {
        $this->authorize('destroy', $document);

        return Document::destroyRecord($document);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Document::class);

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
        $this->authorize('export', Document::class);

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
        $this->authorize('report', Document::class);

        // 
    }
}
