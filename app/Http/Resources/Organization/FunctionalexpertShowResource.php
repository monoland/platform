<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionalexpertShowResource extends JsonResource
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
            'record' => new FunctionalexpertResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-functionalexpert'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-functionalexpert'),
                'print' => $currentUser->hasAnyPermission('print-organization-functionalexpert'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-functionalexpert'),
                'update' => $currentUser->hasAnyPermission('update-organization-functionalexpert'),
            ],

            'links' => [],
        ];
    }
}