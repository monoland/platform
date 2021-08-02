<?php

namespace App\Http\Resources\Account;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentmapShowResource extends JsonResource
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
            'record' => new DocumentmapResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-account-documentmap'),
                'destroy' => $currentUser->hasAnyPermission('destroy-account-documentmap'),
                'print' => $currentUser->hasAnyPermission('print-account-documentmap'),
                'restore' => $currentUser->hasAnyPermission('restore-account-documentmap'),
                'update' => $currentUser->hasAnyPermission('update-account-documentmap'),
            ],

            'links' => [],
        ];
    }
}