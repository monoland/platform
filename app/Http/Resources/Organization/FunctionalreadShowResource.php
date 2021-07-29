<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionalreadShowResource extends JsonResource
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
            'record' => new FunctionalreadResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-functionalread'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-functionalread'),
                'print' => $currentUser->hasAnyPermission('print-organization-functionalread'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-functionalread'),
                'update' => $currentUser->hasAnyPermission('update-organization-functionalread'),
            ],

            'links' => [],
        ];
    }
}