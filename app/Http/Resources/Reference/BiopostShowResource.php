<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class BiopostShowResource extends JsonResource
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
            'record' => new BiopostResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-biopost'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-biopost'),
                'print' => $currentUser->hasAnyPermission('print-reference-biopost'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-biopost'),
                'update' => $currentUser->hasAnyPermission('update-reference-biopost'),
            ],

            'links' => [],
        ];
    }
}