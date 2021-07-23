<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class FaithShowResource extends JsonResource
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
            'record' => new FaithResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-faith'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-faith'),
                'print' => $currentUser->hasAnyPermission('print-reference-faith'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-faith'),
                'update' => $currentUser->hasAnyPermission('update-reference-faith'),
            ],

            'links' => [],
        ];
    }
}