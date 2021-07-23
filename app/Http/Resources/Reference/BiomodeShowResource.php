<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class BiomodeShowResource extends JsonResource
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
            'record' => new BiomodeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-biomode'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-biomode'),
                'print' => $currentUser->hasAnyPermission('print-reference-biomode'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-biomode'),
                'update' => $currentUser->hasAnyPermission('update-reference-biomode'),
            ],

            'links' => [],
        ];
    }
}