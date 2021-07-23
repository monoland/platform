<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionRoomShowResource extends JsonResource
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
            'record' => new SectionRoomResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-section-room'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-section-room'),
                'print' => $currentUser->hasAnyPermission('print-reference-section-room'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-section-room'),
                'update' => $currentUser->hasAnyPermission('update-reference-section-room'),
            ],

            'links' => [],
        ];
    }
}