<?php

namespace App\Http\Resources\System;

use App\Models\System\Page;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleShowResource extends JsonResource
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
            'record' => new ModuleResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-system-module'),
                'destroy' => $currentUser->hasAnyPermission('destroy-system-module'),
                'print' => $currentUser->hasAnyPermission('print-system-module'),
                'restore' => $currentUser->hasAnyPermission('restore-system-module'),
                'update' => $currentUser->hasAnyPermission('update-system-module'),
            ],

            'links' => [
                Page::createLink('system-page'),
                Page::createLink('system-ability')
            ],
        ];
    }
}
