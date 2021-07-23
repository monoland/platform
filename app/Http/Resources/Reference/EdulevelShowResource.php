<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class EdulevelShowResource extends JsonResource
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
            'record' => new EdulevelResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-edulevel'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-edulevel'),
                'print' => $currentUser->hasAnyPermission('print-reference-edulevel'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-edulevel'),
                'update' => $currentUser->hasAnyPermission('update-reference-edulevel'),
            ],

            'links' => [],
        ];
    }
}