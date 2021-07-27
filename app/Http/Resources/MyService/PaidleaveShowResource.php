<?php

namespace App\Http\Resources\MyService;

use Illuminate\Http\Resources\Json\JsonResource;

class PaidleaveShowResource extends JsonResource
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
            'record' => new PaidleaveResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myservice-paidleave'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myservice-paidleave'),
                'print' => $currentUser->hasAnyPermission('print-myservice-paidleave'),
                'restore' => $currentUser->hasAnyPermission('restore-myservice-paidleave'),
                'update' => $currentUser->hasAnyPermission('update-myservice-paidleave'),
            ],

            'links' => [],
        ];
    }
}