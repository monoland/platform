<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\JsonResource;

class UserShowResource extends JsonResource
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
            'record' => new UserResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-system-user'),
                'destroy' => $currentUser->hasAnyPermission('destroy-system-user'),
                'print' => $currentUser->hasAnyPermission('print-system-user'),
                'restore' => $currentUser->hasAnyPermission('restore-system-user'),
                'update' => $currentUser->hasAnyPermission('update-system-user'),
            ],

            'links' => [],
        ];
    }
}
