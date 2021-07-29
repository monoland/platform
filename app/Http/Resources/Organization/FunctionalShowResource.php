<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionalShowResource extends JsonResource
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
            'record' => new FunctionalResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-functional'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-functional'),
                'print' => $currentUser->hasAnyPermission('print-organization-functional'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-functional'),
                'update' => $currentUser->hasAnyPermission('update-organization-functional'),
            ],

            'links' => [],
        ];
    }
}