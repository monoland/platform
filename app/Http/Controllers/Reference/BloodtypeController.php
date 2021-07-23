<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use App\Http\Resources\Reference\BloodtypeCollection;
use App\Http\Resources\Reference\BloodtypeResource;
use App\Models\Reference\Bloodtype;
use Illuminate\Http\Request;

class BloodtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Bloodtype::class);

        return new BloodtypeCollection(
            Bloodtype::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Bloodtype::class);

        $this->validate($request, []);

        return Bloodtype::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference\Bloodtype  $bloodtype
     * @return \Illuminate\Http\Response
     */
    public function show(Bloodtype $bloodtype)
    {
        $this->authorize('show', $bloodtype);

        return new BloodtypeResource($bloodtype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference\Bloodtype  $bloodtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bloodtype $bloodtype)
    {
        $this->authorize('update', $bloodtype);

        $this->validate($request, []);

        return Bloodtype::updateRecord($request, $bloodtype);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference\Bloodtype $bloodtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bloodtype $bloodtype)
    {
        $this->authorize('delete', $bloodtype);

        return Bloodtype::deleteRecord($bloodtype);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Reference\Bloodtype  $bloodtype
     * @return \Illuminate\Http\Response
     */
    public function restore(Bloodtype $bloodtype)
    {
        $this->authorize('restore', $bloodtype);

        return Bloodtype::restoreRecord($bloodtype);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Reference\Bloodtype $bloodtype
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Bloodtype $bloodtype)
    {
        $this->authorize('destroy', $bloodtype);

        return Bloodtype::destroyRecord($bloodtype);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Bloodtype::class);

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
        $this->authorize('export', Bloodtype::class);

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
        $this->authorize('report', Bloodtype::class);

        // 
    }
}
