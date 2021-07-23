<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class EchelonRoomShowResource extends JsonResource
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
            'record' => new EchelonRoomResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-echelon-room'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-echelon-room'),
                'print' => $currentUser->hasAnyPermission('print-reference-echelon-room'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-echelon-room'),
                'update' => $currentUser->hasAnyPermission('update-reference-echelon-room'),
            ],

            'links' => [],
        ];
    }
}