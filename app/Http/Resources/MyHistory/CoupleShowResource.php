<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class CoupleShowResource extends JsonResource
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
            'record' => new CoupleResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-couple'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-couple'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-couple'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-couple'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-couple'),
            ],

            'links' => [],
        ];
    }
}