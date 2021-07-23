<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceShowResource extends JsonResource
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
            'record' => new ProvinceResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-province'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-province'),
                'print' => $currentUser->hasAnyPermission('print-reference-province'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-province'),
                'update' => $currentUser->hasAnyPermission('update-reference-province'),
            ],

            'links' => [],
        ];
    }
}