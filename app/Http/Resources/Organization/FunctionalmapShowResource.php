<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionalmapShowResource extends JsonResource
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
            'record' => new FunctionalmapResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-functionalmap'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-functionalmap'),
                'print' => $currentUser->hasAnyPermission('print-organization-functionalmap'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-functionalmap'),
                'update' => $currentUser->hasAnyPermission('update-organization-functionalmap'),
            ],

            'links' => [],
        ];
    }
}