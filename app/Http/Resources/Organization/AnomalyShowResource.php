<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class AnomalyShowResource extends JsonResource
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
            'record' => new AnomalyResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-anomaly'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-anomaly'),
                'print' => $currentUser->hasAnyPermission('print-organization-anomaly'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-anomaly'),
                'update' => $currentUser->hasAnyPermission('update-organization-anomaly'),
            ],

            'links' => [],
        ];
    }
}