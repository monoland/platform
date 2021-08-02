<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Models\Account\Document;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Account\DocumentResource;
use App\Http\Resources\Account\DocumentCollection;

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

        $filePath = $request->user()->email . DIRECTORY_SEPARATOR . $request->uuid . $request->extension;
        
        if ((int) $request->part === 1 && Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        
        Storage::append($filePath, $request->file('file')->get());

        if ($request->last) {
            return response()->json([
                'url' => Storage::url($request->uuid . $request->extension),
                'path' => $request->uuid . $request->extension
            ], 200);
        }

        return response()->json([
            'success' => true
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\Document  $document
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
     * @param  \App\Models\Account\Document  $document
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
     * @param  \App\Models\Account\Document $document
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
     * @param \App\Models\Account\Document  $document
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
     * @param \App\Models\Account\Document $document
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

    public function preview(Request $request, $filename)
    {
        return Storage::response($request->user()->email . DIRECTORY_SEPARATOR . $filename);
    }
}
