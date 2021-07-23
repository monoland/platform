<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\JsonResource;

class AbilityShowResource extends JsonResource
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
            'record' => new AbilityResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-system-ability'),
                'destroy' => $currentUser->hasAnyPermission('destroy-system-ability'),
                'print' => $currentUser->hasAnyPermission('print-system-ability'),
                'restore' => $currentUser->hasAnyPermission('restore-system-ability'),
                'update' => $currentUser->hasAnyPermission('update-system-ability'),
            ],

            'links' => [],
        ];
    }
}
