<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class StructuralShowResource extends JsonResource
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
            'record' => new StructuralResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-structural'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-structural'),
                'print' => $currentUser->hasAnyPermission('print-organization-structural'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-structural'),
                'update' => $currentUser->hasAnyPermission('update-organization-structural'),
            ],

            'links' => [],
        ];
    }
}