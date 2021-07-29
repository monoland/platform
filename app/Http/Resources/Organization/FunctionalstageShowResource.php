<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionalstageShowResource extends JsonResource
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
            'record' => new FunctionalstageResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-functionalstage'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-functionalstage'),
                'print' => $currentUser->hasAnyPermission('print-organization-functionalstage'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-functionalstage'),
                'update' => $currentUser->hasAnyPermission('update-organization-functionalstage'),
            ],

            'links' => [],
        ];
    }
}