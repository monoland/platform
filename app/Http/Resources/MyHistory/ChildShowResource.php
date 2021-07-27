<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class ChildShowResource extends JsonResource
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
            'record' => new ChildResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-child'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-child'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-child'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-child'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-child'),
            ],

            'links' => [],
        ];
    }
}