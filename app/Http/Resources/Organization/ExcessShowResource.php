<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class ExcessShowResource extends JsonResource
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
            'record' => new ExcessResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-excess'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-excess'),
                'print' => $currentUser->hasAnyPermission('print-organization-excess'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-excess'),
                'update' => $currentUser->hasAnyPermission('update-organization-excess'),
            ],

            'links' => [],
        ];
    }
}