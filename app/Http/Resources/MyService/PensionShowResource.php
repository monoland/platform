<?php

namespace App\Http\Resources\MyService;

use Illuminate\Http\Resources\Json\JsonResource;

class PensionShowResource extends JsonResource
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
            'record' => new PensionResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myservice-pension'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myservice-pension'),
                'print' => $currentUser->hasAnyPermission('print-myservice-pension'),
                'restore' => $currentUser->hasAnyPermission('restore-myservice-pension'),
                'update' => $currentUser->hasAnyPermission('update-myservice-pension'),
            ],

            'links' => [],
        ];
    }
}