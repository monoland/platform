<?php

namespace App\Http\Controllers\MyService;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyService\PersoncardCollection;
use App\Http\Resources\MyService\PersoncardResource;
use App\Models\MyService\Personcard;
use Illuminate\Http\Request;

class PersoncardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Personcard::class);

        return new PersoncardCollection(
            Personcard::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Personcard::class);

        $this->validate($request, []);

        return Personcard::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyService\Personcard  $personcard
     * @return \Illuminate\Http\Response
     */
    public function show(Personcard $personcard)
    {
        $this->authorize('show', $personcard);

        return new PersoncardResource($personcard);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyService\Personcard  $personcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personcard $personcard)
    {
        $this->authorize('update', $personcard);

        $this->validate($request, []);

        return Personcard::updateRecord($request, $personcard);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyService\Personcard $personcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personcard $personcard)
    {
        $this->authorize('delete', $personcard);

        return Personcard::deleteRecord($personcard);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyService\Personcard  $personcard
     * @return \Illuminate\Http\Response
     */
    public function restore(Personcard $personcard)
    {
        $this->authorize('restore', $personcard);

        return Personcard::restoreRecord($personcard);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyService\Personcard $personcard
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Personcard $personcard)
    {
        $this->authorize('destroy', $personcard);

        return Personcard::destroyRecord($personcard);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Personcard::class);

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
        $this->authorize('export', Personcard::class);

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
        $this->authorize('report', Personcard::class);

        // 
    }
}
