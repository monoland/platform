<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkunitShowResource extends JsonResource
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
            'record' => new WorkunitResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-workunit'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-workunit'),
                'print' => $currentUser->hasAnyPermission('print-reference-workunit'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-workunit'),
                'update' => $currentUser->hasAnyPermission('update-reference-workunit'),
            ],

            'links' => [],
        ];
    }
}