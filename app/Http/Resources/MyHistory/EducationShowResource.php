<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationShowResource extends JsonResource
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
            'record' => new EducationResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-education'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-education'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-education'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-education'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-education'),
            ],

            'links' => [],
        ];
    }
}