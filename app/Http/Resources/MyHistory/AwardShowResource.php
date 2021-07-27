<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class AwardShowResource extends JsonResource
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
            'record' => new AwardResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-award'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-award'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-award'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-award'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-award'),
            ],

            'links' => [],
        ];
    }
}