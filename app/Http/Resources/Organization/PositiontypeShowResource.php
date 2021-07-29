<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class PositiontypeShowResource extends JsonResource
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
            'record' => new PositiontypeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-positiontype'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-positiontype'),
                'print' => $currentUser->hasAnyPermission('print-organization-positiontype'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-positiontype'),
                'update' => $currentUser->hasAnyPermission('update-organization-positiontype'),
            ],

            'links' => [],
        ];
    }
}