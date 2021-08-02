<?php

namespace App\Http\Resources\Organization;

use App\Models\System\Page;
use Illuminate\Http\Resources\Json\JsonResource;

class PositionmapShowResource extends JsonResource
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
            'record' => new PositionmapResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-organization-positionmap'),
                'destroy' => $currentUser->hasAnyPermission('destroy-organization-positionmap'),
                'print' => $currentUser->hasAnyPermission('print-organization-positionmap'),
                'restore' => $currentUser->hasAnyPermission('restore-organization-positionmap'),
                'update' => $currentUser->hasAnyPermission('update-organization-positionmap'),
            ],

            'links' => [
                Page::createLink('organization-positiontype'),
            ],
        ];
    }
}
