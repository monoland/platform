<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class PaidleaveShowResource extends JsonResource
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
            'record' => new PaidleaveResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-myhistory-paidleave'),
                'destroy' => $currentUser->hasAnyPermission('destroy-myhistory-paidleave'),
                'print' => $currentUser->hasAnyPermission('print-myhistory-paidleave'),
                'restore' => $currentUser->hasAnyPermission('restore-myhistory-paidleave'),
                'update' => $currentUser->hasAnyPermission('update-myhistory-paidleave'),
            ],

            'links' => [],
        ];
    }
}