<?php

namespace App\Models\MyAccount;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\DatabaseNotification as Model;

class Notification extends Model
{
    /**
     * scope for data-filter
     *
     * @param Builder $query
     * @param Request $request
     * @return void
     */
    public function scopeFilterOn(Builder $query, Request $request)
    {
        $sortBy = strtolower($request->sortBy) ?: null;
        $sortAz = $request->sortDesc ? 'desc' : 'asc';
        $findBy = strtolower($request->findBy) ?: null;
        $findOn = $request->findOn ?: [];

        $trashed = $request->mode === 'trashed' ?: false;
        $filterOn = $request->filterOn ?: [];
        $filterBy = $request->filterBy ?: [];
        $filterOp = $request->filterOp ?: [];

        $mquery = $query;

        if ($trashed) {
            $mquery = $mquery->onlyTrashed();
        }

        foreach ($findOn as $key => $find) {
            if ($key <= 0) {
                $mquery = $mquery->whereRaw("LOWER({$find}) LIKE ?", ["%{$findBy}%"]);
            } else {
                $mquery = $mquery->orWhereRaw("LOWER({$find}) LIKE ?", ["%{$findBy}%"]);
            }
        }

        foreach ($filterOp as $i => $operation) {
            if ($operation === '*') {
                $mquery = $mquery->whereRaw("{$filterOn[$i]} LIKE ?", ["%{$filterBy[$i]}%"]);
            } else {
                $mquery = $mquery->whereRaw("{$filterOn[$i]} {$operation} ?", ["{$filterBy[$i]}"]);
            }
        }

        if ($sortBy) {
            $mquery = $mquery->orderBy($sortBy, $sortAz);
        } else {
            $mquery = $mquery->orderBy('title', $sortAz);
        }

        return $mquery;
    }
}
