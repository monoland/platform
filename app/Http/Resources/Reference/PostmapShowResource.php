<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class PostmapShowResource extends JsonResource
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
            'record' => new PostmapResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-postmap'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-postmap'),
                'print' => $currentUser->hasAnyPermission('print-reference-postmap'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-postmap'),
                'update' => $currentUser->hasAnyPermission('update-reference-postmap'),
            ],

            'links' => [],
        ];
    }
}