<?php

namespace App\Http\Resources\MyService;

use Illuminate\Http\Resources\Json\JsonResource;

class PromotionShowResource extends JsonResource
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
            'record' => new PromotionResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myservice-promotion'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myservice-promotion'),
                'print' => $currentUser->hasAnyPermission('print-myservice-promotion'),
                'restore' => $currentUser->hasAnyPermission('restore-myservice-promotion'),
                'update' => $currentUser->hasAnyPermission('update-myservice-promotion'),
            ],

            'links' => [],
        ];
    }
}