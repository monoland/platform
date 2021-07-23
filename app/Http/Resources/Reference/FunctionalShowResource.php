<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionalShowResource extends JsonResource
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
            'record' => new FunctionalResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-functional'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-functional'),
                'print' => $currentUser->hasAnyPermission('print-reference-functional'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-functional'),
                'update' => $currentUser->hasAnyPermission('update-reference-functional'),
            ],

            'links' => [],
        ];
    }
}