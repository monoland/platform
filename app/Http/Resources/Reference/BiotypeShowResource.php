<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class BiotypeShowResource extends JsonResource
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
            'record' => new BiotypeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-biotype'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-biotype'),
                'print' => $currentUser->hasAnyPermission('print-reference-biotype'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-biotype'),
                'update' => $currentUser->hasAnyPermission('update-reference-biotype'),
            ],

            'links' => [],
        ];
    }
}