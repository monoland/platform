<?php

namespace App\Http\Resources\Reference;

use Illuminate\Http\Resources\Json\JsonResource;

class ExecutorShowResource extends JsonResource
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
            'record' => new ExecutorResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-executor'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-executor'),
                'print' => $currentUser->hasAnyPermission('print-reference-executor'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-executor'),
                'update' => $currentUser->hasAnyPermission('update-reference-executor'),
            ],

            'links' => [],
        ];
    }
}