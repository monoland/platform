<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpertiseShowResource extends JsonResource
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
            'record' => new ExpertiseResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-expertise'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-expertise'),
                'print' => $currentUser->hasAnyPermission('print-reference-expertise'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-expertise'),
                'update' => $currentUser->hasAnyPermission('update-reference-expertise'),
            ],

            'links' => [],
        ];
    }
}