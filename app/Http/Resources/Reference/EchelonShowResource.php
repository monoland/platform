<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class EchelonShowResource extends JsonResource
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
            'record' => new EchelonResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-echelon'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-echelon'),
                'print' => $currentUser->hasAnyPermission('print-reference-echelon'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-echelon'),
                'update' => $currentUser->hasAnyPermission('update-reference-echelon'),
            ],

            'links' => [],
        ];
    }
}