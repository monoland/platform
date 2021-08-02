<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class EmptinessShowResource extends JsonResource
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
            'record' => new EmptinessResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-emptiness'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-emptiness'),
                'print' => $currentUser->hasAnyPermission('print-organization-emptiness'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-emptiness'),
                'update' => $currentUser->hasAnyPermission('update-organization-emptiness'),
            ],

            'links' => [],
        ];
    }
}