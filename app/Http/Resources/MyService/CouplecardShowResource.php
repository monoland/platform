<?php

namespace App\Http\Resources\MyService;

use Illuminate\Http\Resources\Json\JsonResource;

class CouplecardShowResource extends JsonResource
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
            'record' => new CouplecardResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myservice-couplecard'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myservice-couplecard'),
                'print' => $currentUser->hasAnyPermission('print-myservice-couplecard'),
                'restore' => $currentUser->hasAnyPermission('restore-myservice-couplecard'),
                'update' => $currentUser->hasAnyPermission('update-myservice-couplecard'),
            ],

            'links' => [],
        ];
    }
}