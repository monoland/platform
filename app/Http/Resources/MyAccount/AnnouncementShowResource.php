<?php

namespace App\Http\Resources\MyAccount;

use App\Models\System\Page;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementShowResource extends JsonResource
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
            'record' => new AnnouncementResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myaccount-announcement'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myaccount-announcement'),
                'print' => $currentUser->hasAnyPermission('print-myaccount-announcement'),
                'restore' => $currentUser->hasAnyPermission('restore-myaccount-announcement'),
                'update' => $currentUser->hasAnyPermission('update-myaccount-announcement'),
            ],

            'links' => [
                Page::createLink('myaccount-notification')
            ],
        ];
    }
}
