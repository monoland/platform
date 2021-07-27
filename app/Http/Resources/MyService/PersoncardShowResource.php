<?php

namespace App\Http\Resources\MyService;

use Illuminate\Http\Resources\Json\JsonResource;

class PersoncardShowResource extends JsonResource
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
            'record' => new PersoncardResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myservice-personcard'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myservice-personcard'),
                'print' => $currentUser->hasAnyPermission('print-myservice-personcard'),
                'restore' => $currentUser->hasAnyPermission('restore-myservice-personcard'),
                'update' => $currentUser->hasAnyPermission('update-myservice-personcard'),
            ],

            'links' => [],
        ];
    }
}