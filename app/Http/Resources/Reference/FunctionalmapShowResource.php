<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionalmapShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $currentUser = $request->user();

        return [
            'record' => new FunctionalmapResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-functionalmap'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-functionalmap'),
                'print' => $currentUser->hasAnyPermission('print-reference-functionalmap'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-functionalmap'),
                'update' => $currentUser->hasAnyPermission('update-reference-functionalmap'),
            ],

            'links' => [],
        ];
    }
}