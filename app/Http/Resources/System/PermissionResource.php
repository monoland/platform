<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'module' => $this->module->slug,
            'page' => $this->page->slug,

            // activate this when use nested table
            // visit https://github.com/lazychaser/laravel-nestedset for detail
            // 'nest_deep' => $this->depth,
            // 'nest_leaf' => $this->isLeaf(),
            // 'nest_next' => $this->nextSiblings()->count() > 0,
            // 'nest_prev' => $this->prevSiblings()->count() > 0,
            
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
