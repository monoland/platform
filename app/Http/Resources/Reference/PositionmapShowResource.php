<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionmapShowResource extends JsonResource
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
            'record' => new PositionmapResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-positionmap'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-positionmap'),
                'print' => $currentUser->hasAnyPermission('print-reference-positionmap'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-positionmap'),
                'update' => $currentUser->hasAnyPermission('update-reference-positionmap'),
            ],

            'links' => [],
        ];
    }
}