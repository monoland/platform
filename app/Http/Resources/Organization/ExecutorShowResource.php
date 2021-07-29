<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class ExecutorShowResource extends JsonResource
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
            'record' => new ExecutorResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-executor'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-executor'),
                'print' => $currentUser->hasAnyPermission('print-organization-executor'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-executor'),
                'update' => $currentUser->hasAnyPermission('update-organization-executor'),
            ],

            'links' => [],
        ];
    }
}