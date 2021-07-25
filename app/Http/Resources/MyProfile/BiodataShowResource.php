<?php

namespace App\Http\Resources\MyProfile;

use Illuminate\Http\Resources\Json\JsonResource;

class BiodataShowResource extends JsonResource
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
            'record' => new BiodataResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myprofile-biodata'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myprofile-biodata'),
                'print' => $currentUser->hasAnyPermission('print-myprofile-biodata'),
                'restore' => $currentUser->hasAnyPermission('restore-myprofile-biodata'),
                'update' => $currentUser->hasAnyPermission('update-myprofile-biodata'),
            ],

            'links' => [],
        ];
    }
}