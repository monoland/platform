<?php

namespace App\Http\Resources\MyService;

use Illuminate\Http\Resources\Json\JsonResource;

class DivorceShowResource extends JsonResource
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
            'record' => new DivorceResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myservice-divorce'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myservice-divorce'),
                'print' => $currentUser->hasAnyPermission('print-myservice-divorce'),
                'restore' => $currentUser->hasAnyPermission('restore-myservice-divorce'),
                'update' => $currentUser->hasAnyPermission('update-myservice-divorce'),
            ],

            'links' => [],
        ];
    }
}