<?php

namespace App\Http\Resources\Reference;

use App\Models\System\Page;
use Illuminate\Http\Resources\Json\JsonResource;

class EchelonmapShowResource extends JsonResource
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
            'record' => new EchelonmapResource($this),
            
            'features' => [
                'delete' => $currentUser->hasAnyPermission('delete-reference-echelonmap'),
                'destroy' => $currentUser->hasAnyPermission('destroy-reference-echelonmap'),
                'print' => $currentUser->hasAnyPermission('print-reference-echelonmap'),
                'restore' => $currentUser->hasAnyPermission('restore-reference-echelonmap'),
                'update' => $currentUser->hasAnyPermission('update-reference-echelonmap'),
            ],

            'links' => [
                Page::createLink('reference-echelon'),
            ],
        ];
    }
}
