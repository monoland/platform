<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class MaritalShowResource extends JsonResource
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
            'record' => new MaritalResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-marital'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-marital'),
                'print' => $currentUser->hasAnyPermission('print-reference-marital'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-marital'),
                'update' => $currentUser->hasAnyPermission('update-reference-marital'),
            ],

            'links' => [],
        ];
    }
}