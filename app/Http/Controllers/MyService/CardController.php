<?php

namespace App\Http\Controllers\MyService;

use App\Http\Controllers\Controller;
use App\Http\Resources\MyService\CardCollection;
use App\Http\Resources\MyService\CardResource;
use App\Models\MyService\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', Card::class);

        return new CardCollection(
            Card::filterOn($request)->paginate($request->itemsPerPage)
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
        $this->authorize('create', Card::class);

        $this->validate($request, []);

        return Card::storeRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyService\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        $this->authorize('show', $card);

        return new CardResource($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyService\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $this->authorize('update', $card);

        $this->validate($request, []);

        return Card::updateRecord($request, $card);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyService\Card $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $this->authorize('delete', $card);

        return Card::deleteRecord($card);
    }

    /**
     * Restore the specified resource from deleted
     *
     * @param \App\Models\MyService\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function restore(Card $card)
    {
        $this->authorize('restore', $card);

        return Card::restoreRecord($card);
    }

    /**
     * Force Delete the specified resource
     *
     * @param \App\Models\MyService\Card $card
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Card $card)
    {
        $this->authorize('destroy', $card);

        return Card::destroyRecord($card);
    }

    /**
     * Import data to the model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $this->authorize('import', Card::class);

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
        $this->authorize('export', Card::class);

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
        $this->authorize('report', Card::class);

        // 
    }
}
