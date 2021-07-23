<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class GenderShowResource extends JsonResource
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
            'record' => new GenderResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-gender'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-gender'),
                'print' => $currentUser->hasAnyPermission('print-reference-gender'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-gender'),
                'update' => $currentUser->hasAnyPermission('update-reference-gender'),
            ],

            'links' => [],
        ];
    }
}