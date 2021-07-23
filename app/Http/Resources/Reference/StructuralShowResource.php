<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class StructuralShowResource extends JsonResource
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
            'record' => new StructuralResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-structural'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-structural'),
                'print' => $currentUser->hasAnyPermission('print-reference-structural'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-structural'),
                'update' => $currentUser->hasAnyPermission('update-reference-structural'),
            ],

            'links' => [],
        ];
    }
}