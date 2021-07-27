<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class GoalShowResource extends JsonResource
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
            'record' => new GoalResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-goal'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-goal'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-goal'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-goal'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-goal'),
            ],

            'links' => [],
        ];
    }
}