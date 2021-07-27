<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class ParentsShowResource extends JsonResource
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
            'record' => new ParentsResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-parents'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-parents'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-parents'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-parents'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-parents'),
            ],

            'links' => [],
        ];
    }
}