<?php

namespace App\Http\Resources\MyProfile;

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
                'delete' => $currentUser->hasAnyPermission('delete-myprofile-document'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myprofile-document'),
                'print' => $currentUser->hasAnyPermission('print-myprofile-document'),
                'restore' => $currentUser->hasAnyPermission('restore-myprofile-document'),
                'update' => $currentUser->hasAnyPermission('update-myprofile-document'),
            ],

            'links' => [],
        ];
    }
}