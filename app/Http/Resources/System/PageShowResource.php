<?php

namespace App\Http\Resources\System;

use App\Models\System\Page;
use Illuminate\Http\Resources\Json\JsonResource;

class PageShowResource extends JsonResource
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
            'record' => new PageResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-system-page'),
                'destroy' => $currentUser->hasAnyPermission('destroy-system-page'),
                'print' => $currentUser->hasAnyPermission('print-system-page'),
                'restore' => $currentUser->hasAnyPermission('restore-system-page'),
                'update' => $currentUser->hasAnyPermission('update-system-page'),
            ],

            'links' => [
                Page::createLink('system-permission'),
            ],
        ];
    }
}
