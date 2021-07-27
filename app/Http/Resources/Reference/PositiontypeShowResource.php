<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class PositiontypeShowResource extends JsonResource
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
            'record' => new PositiontypeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-positiontype'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-positiontype'),
                'print' => $currentUser->hasAnyPermission('print-reference-positiontype'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-positiontype'),
                'update' => $currentUser->hasAnyPermission('update-reference-positiontype'),
            ],

            'links' => [],
        ];
    }
}