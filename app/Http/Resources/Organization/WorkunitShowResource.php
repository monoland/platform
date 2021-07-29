<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkunitShowResource extends JsonResource
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
            'record' => new WorkunitResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-workunit'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-workunit'),
                'print' => $currentUser->hasAnyPermission('print-organization-workunit'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-workunit'),
                'update' => $currentUser->hasAnyPermission('update-organization-workunit'),
            ],

            'links' => [],
        ];
    }
}