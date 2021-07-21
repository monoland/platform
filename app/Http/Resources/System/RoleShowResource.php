<?php

namespace App\Http\Resources\System;

use App\Models\System\Page;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleShowResource extends JsonResource
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
            'record' => new RoleResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-system-role'),
                'destroy' => $currentUser->hasAnyPermission('destroy-system-role'),
                'print' => $currentUser->hasAnyPermission('print-system-role'),
                'restore' => $currentUser->hasAnyPermission('restore-system-role'),
                'update' => $currentUser->hasAnyPermission('update-system-role'),
            ],

            'links' => [
                
            ],
        ];
    }
}
