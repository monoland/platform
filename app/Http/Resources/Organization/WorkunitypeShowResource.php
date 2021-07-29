<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkunitypeShowResource extends JsonResource
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
            'record' => new WorkunitypeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-workunitype'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-workunitype'),
                'print' => $currentUser->hasAnyPermission('print-organization-workunitype'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-workunitype'),
                'update' => $currentUser->hasAnyPermission('update-organization-workunitype'),
            ],

            'links' => [],
        ];
    }
}