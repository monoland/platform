<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionShowResource extends JsonResource
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
            'record' => new PermissionResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-system-permission'),
                'destroy' => $currentUser->hasAnyPermission('destroy-system-permission'),
                'print' => $currentUser->hasAnyPermission('print-system-permission'),
                'restore' => $currentUser->hasAnyPermission('restore-system-permission'),
                'update' => $currentUser->hasAnyPermission('update-system-permission'),
            ],

            'links' => [],
        ];
    }
}
