<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class WorktypeShowResource extends JsonResource
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
            'record' => new WorktypeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-worktype'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-worktype'),
                'print' => $currentUser->hasAnyPermission('print-reference-worktype'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-worktype'),
                'update' => $currentUser->hasAnyPermission('update-reference-worktype'),
            ],

            'links' => [],
        ];
    }
}