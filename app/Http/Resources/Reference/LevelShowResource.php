<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class LevelShowResource extends JsonResource
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
            'record' => new LevelResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-level'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-level'),
                'print' => $currentUser->hasAnyPermission('print-reference-level'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-level'),
                'update' => $currentUser->hasAnyPermission('update-reference-level'),
            ],

            'links' => [],
        ];
    }
}