<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewShowResource extends JsonResource
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
            'record' => new ReviewResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-review'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-review'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-review'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-review'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-review'),
            ],

            'links' => [],
        ];
    }
}