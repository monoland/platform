<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class StatusShowResource extends JsonResource
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
            'record' => new StatusResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-status'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-status'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-status'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-status'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-status'),
            ],

            'links' => [],
        ];
    }
}