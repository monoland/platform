<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class FunctionaltypeShowResource extends JsonResource
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
            'record' => new FunctionaltypeResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-functionaltype'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-functionaltype'),
                'print' => $currentUser->hasAnyPermission('print-reference-functionaltype'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-functionaltype'),
                'update' => $currentUser->hasAnyPermission('update-reference-functionaltype'),
            ],

            'links' => [],
        ];
    }
}