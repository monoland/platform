<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionkindShowResource extends JsonResource
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
            'record' => new PositionkindResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-positionkind'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-positionkind'),
                'print' => $currentUser->hasAnyPermission('print-organization-positionkind'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-positionkind'),
                'update' => $currentUser->hasAnyPermission('update-organization-positionkind'),
            ],

            'links' => [],
        ];
    }
}