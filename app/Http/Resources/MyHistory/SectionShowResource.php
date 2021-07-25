<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionShowResource extends JsonResource
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
            'record' => new SectionResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-section'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-section'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-section'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-section'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-section'),
            ],

            'links' => [],
        ];
    }
}