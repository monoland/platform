<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkunitreadShowResource extends JsonResource
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
            'record' => new WorkunitreadResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-workunitread'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-workunitread'),
                'print' => $currentUser->hasAnyPermission('print-organization-workunitread'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-workunitread'),
                'update' => $currentUser->hasAnyPermission('update-organization-workunitread'),
            ],

            'links' => [],
        ];
    }
}