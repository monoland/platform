<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class VillageShowResource extends JsonResource
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
            'record' => new VillageResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-village'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-village'),
                'print' => $currentUser->hasAnyPermission('print-reference-village'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-village'),
                'update' => $currentUser->hasAnyPermission('update-reference-village'),
            ],

            'links' => [],
        ];
    }
}