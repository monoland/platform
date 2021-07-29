<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class EchelonmapShowResource extends JsonResource
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
            'record' => new EchelonmapResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-echelonmap'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-echelonmap'),
                'print' => $currentUser->hasAnyPermission('print-organization-echelonmap'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-echelonmap'),
                'update' => $currentUser->hasAnyPermission('update-organization-echelonmap'),
            ],

            'links' => [],
        ];
    }
}