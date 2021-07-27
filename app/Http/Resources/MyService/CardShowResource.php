<?php

namespace App\Http\Resources\MyService;

use Illuminate\Http\Resources\Json\JsonResource;

class CardShowResource extends JsonResource
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
            'record' => new CardResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myservice-card'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myservice-card'),
                'print' => $currentUser->hasAnyPermission('print-myservice-card'),
                'restore' => $currentUser->hasAnyPermission('restore-myservice-card'),
                'update' => $currentUser->hasAnyPermission('update-myservice-card'),
            ],

            'links' => [],
        ];
    }
}