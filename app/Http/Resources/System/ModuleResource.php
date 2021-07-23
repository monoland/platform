<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
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
            'icon' => $this->icon,
            'name' => $this->name,
            'slug' => $this->slug,
            'color' => $this->color,
            'path' => $this->path,
            'visibility' => $this->visibility,
            'describe' => $this->describe,
            'abilities' => AbilityResource::collection($this->whenLoaded('abilities')),
            'pages' => PageResource::collection($this->whenLoaded('pages')),
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
