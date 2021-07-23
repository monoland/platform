<?php

namespace App\Http\Resources\Reference;

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
                'delete' => $currentUser->hasAnyPermission('delete-reference-section'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-section'),
                'print' => $currentUser->hasAnyPermission('print-reference-section'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-section'),
                'update' => $currentUser->hasAnyPermission('update-reference-section'),
            ],

            'links' => [],
        ];
    }
}