<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseShowResource extends JsonResource
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
            'record' => new CourseResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-course'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-course'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-course'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-course'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-course'),
            ],

            'links' => [],
        ];
    }
}