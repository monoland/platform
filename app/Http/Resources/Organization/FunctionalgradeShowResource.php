<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionalgradeShowResource extends JsonResource
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
            'record' => new FunctionalgradeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-functionalgrade'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-functionalgrade'),
                'print' => $currentUser->hasAnyPermission('print-organization-functionalgrade'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-functionalgrade'),
                'update' => $currentUser->hasAnyPermission('update-organization-functionalgrade'),
            ],

            'links' => [],
        ];
    }
}