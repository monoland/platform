<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class DistrictShowResource extends JsonResource
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
            'record' => new DistrictResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-district'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-district'),
                'print' => $currentUser->hasAnyPermission('print-reference-district'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-district'),
                'update' => $currentUser->hasAnyPermission('update-reference-district'),
            ],

            'links' => [],
        ];
    }
}