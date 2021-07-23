<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class BloodtypeShowResource extends JsonResource
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
            'record' => new BloodtypeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-bloodtype'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-bloodtype'),
                'print' => $currentUser->hasAnyPermission('print-reference-bloodtype'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-bloodtype'),
                'update' => $currentUser->hasAnyPermission('update-reference-bloodtype'),
            ],

            'links' => [],
        ];
    }
}