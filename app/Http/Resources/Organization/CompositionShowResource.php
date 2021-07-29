<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class CompositionShowResource extends JsonResource
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
            'record' => new CompositionResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-composition'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-composition'),
                'print' => $currentUser->hasAnyPermission('print-organization-composition'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-composition'),
                'update' => $currentUser->hasAnyPermission('update-organization-composition'),
            ],

            'links' => [],
        ];
    }
}