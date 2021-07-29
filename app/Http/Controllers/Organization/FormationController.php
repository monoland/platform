<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Resources\Organization\FormationCollection;
use App\Models\Organization\Composition;
use App\Models\Organization\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Composition $composition)
    {
        $this->authorize('view', Formation::class);

        return new FormationCollection(
            $composition->formations()->filterOn($request)->paginate($request->itemsPerPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Composition $composition)
    {
        $this->authorize('create', Formation::class);

        $this->validate($request, []);

        return Formation::storeRecord($request, $composition);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization\Composition  $composition
     * @param  \App\Models\Organization\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Composition $composition, Formation $formation)
    {
        $this->authorize('show', $formation);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Composition  $composition
     * @param  \App\Models\Organization\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Composition $composition, Formation $formation)
    {
        $this->authorize('update', $formation);

        $this->validate($request, []);

        return Formation::updateRecord($request, $formation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization\Composition  $composition
     * @param  \App\Models\Organization\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Composition $composition, Formation $formation)
    {
        $this->authorize('delete', $formation);

        return Formation::deleteRecord($formation);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\Organization\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function restore(Composition $composition, Formation $formation)
    {
        $this->authorize('restore', $formation);

        return Formation::restoreRecord($formation);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\Organization\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Composition $composition, Formation $formation)
    {
        $this->authorize('destroy', $formation);

        return Formation::destroyRecord($formation);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, Composition $composition)
    {
        $this->authorize('import', Formation::class);

        // 
    }

    /**
     * Export data from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request, Composition $composition)
    {
        $this->authorize('export', Formation::class);

        // 
    }

    /**
     * Print report from the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization\Composition  $composition
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Composition $composition)
    {
        $this->authorize('report', Formation::class);

        // 
    }
}
