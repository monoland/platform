<?php

namespace App\Http\Resources\MyService;

use Illuminate\Http\Resources\Json\JsonResource;

class InclusionShowResource extends JsonResource
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
            'record' => new InclusionResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myservice-inclusion'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myservice-inclusion'),
                'print' => $currentUser->hasAnyPermission('print-myservice-inclusion'),
                'restore' => $currentUser->hasAnyPermission('restore-myservice-inclusion'),
                'update' => $currentUser->hasAnyPermission('update-myservice-inclusion'),
            ],

            'links' => [],
        ];
    }
}