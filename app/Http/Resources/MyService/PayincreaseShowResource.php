<?php

namespace App\Http\Resources\MyService;

use Illuminate\Http\Resources\Json\JsonResource;

class PayincreaseShowResource extends JsonResource
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
            'record' => new PayincreaseResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myservice-payincrease'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myservice-payincrease'),
                'print' => $currentUser->hasAnyPermission('print-myservice-payincrease'),
                'restore' => $currentUser->hasAnyPermission('restore-myservice-payincrease'),
                'update' => $currentUser->hasAnyPermission('update-myservice-payincrease'),
            ],

            'links' => [],
        ];
    }
}