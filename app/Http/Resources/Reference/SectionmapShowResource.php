<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionmapShowResource extends JsonResource
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
            'record' => new SectionmapResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-sectionmap'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-sectionmap'),
                'print' => $currentUser->hasAnyPermission('print-reference-sectionmap'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-sectionmap'),
                'update' => $currentUser->hasAnyPermission('update-reference-sectionmap'),
            ],

            'links' => [],
        ];
    }
}