<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class RegencyShowResource extends JsonResource
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
            'record' => new RegencyResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-regency'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-regency'),
                'print' => $currentUser->hasAnyPermission('print-reference-regency'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-regency'),
                'update' => $currentUser->hasAnyPermission('update-reference-regency'),
            ],

            'links' => [],
        ];
    }
}