<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionkindShowResource extends JsonResource
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
            'record' => new PositionkindResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-positionkind'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-positionkind'),
                'print' => $currentUser->hasAnyPermission('print-reference-positionkind'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-positionkind'),
                'update' => $currentUser->hasAnyPermission('update-reference-positionkind'),
            ],

            'links' => [],
        ];
    }
}