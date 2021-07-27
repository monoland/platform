<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationShowResource extends JsonResource
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
            'record' => new OrganizationResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-organization'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-organization'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-organization'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-organization'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-organization'),
            ],

            'links' => [],
        ];
    }
}