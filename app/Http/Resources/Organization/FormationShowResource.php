<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class FormationShowResource extends JsonResource
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
            'record' => new FormationResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-formation'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-formation'),
                'print' => $currentUser->hasAnyPermission('print-organization-formation'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-formation'),
                'update' => $currentUser->hasAnyPermission('update-organization-formation'),
            ],

            'links' => [],
        ];
    }
}