<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class SpotShowResource extends JsonResource
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
            'record' => new SpotResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-spot'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-spot'),
                'print' => $currentUser->hasAnyPermission('print-reference-spot'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-spot'),
                'update' => $currentUser->hasAnyPermission('update-reference-spot'),
            ],

            'links' => [],
        ];
    }
}