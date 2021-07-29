<?php

namespace App\Http\Resources\Organization;

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
                'delete' => $currentUser->hasAnyPermission('delete-organization-echelon'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-echelon'),
                'print' => $currentUser->hasAnyPermission('print-organization-echelon'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-echelon'),
                'update' => $currentUser->hasAnyPermission('update-organization-echelon'),
            ],

            'links' => [],
        ];
    }
}