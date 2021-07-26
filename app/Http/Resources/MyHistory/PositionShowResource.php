<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionShowResource extends JsonResource
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
            'record' => new PositionResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-position'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-position'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-position'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-position'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-position'),
            ],

            'links' => [],
        ];
    }
}