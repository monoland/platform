<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class EdumajorShowResource extends JsonResource
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
            'record' => new EdumajorResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-edumajor'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-edumajor'),
                'print' => $currentUser->hasAnyPermission('print-reference-edumajor'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-edumajor'),
                'update' => $currentUser->hasAnyPermission('update-reference-edumajor'),
            ],

            'links' => [],
        ];
    }
}