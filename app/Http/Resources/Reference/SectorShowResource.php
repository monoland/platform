<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class SectorShowResource extends JsonResource
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
            'record' => new SectorResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-sector'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-sector'),
                'print' => $currentUser->hasAnyPermission('print-reference-sector'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-sector'),
                'update' => $currentUser->hasAnyPermission('update-reference-sector'),
            ],

            'links' => [],
        ];
    }
}