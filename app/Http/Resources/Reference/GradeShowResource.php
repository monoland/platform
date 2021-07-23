<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class GradeShowResource extends JsonResource
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
            'record' => new GradeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-grade'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-grade'),
                'print' => $currentUser->hasAnyPermission('print-reference-grade'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-grade'),
                'update' => $currentUser->hasAnyPermission('update-reference-grade'),
            ],

            'links' => [],
        ];
    }
}