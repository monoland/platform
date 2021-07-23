<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class PostypeShowResource extends JsonResource
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
            'record' => new PostypeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-postype'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-postype'),
                'print' => $currentUser->hasAnyPermission('print-reference-postype'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-postype'),
                'update' => $currentUser->hasAnyPermission('update-reference-postype'),
            ],

            'links' => [],
        ];
    }
}