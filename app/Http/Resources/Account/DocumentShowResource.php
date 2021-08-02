<?php

namespace App\Http\Resources\Account;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentShowResource extends JsonResource
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
            'record' => new DocumentResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-account-document'),
                'destroy' => $currentUser->hasAnyPermission('destroy-account-document'),
                'print' => $currentUser->hasAnyPermission('print-account-document'),
                'restore' => $currentUser->hasAnyPermission('restore-account-document'),
                'update' => $currentUser->hasAnyPermission('update-account-document'),
            ],

            'links' => [],
        ];
    }
}