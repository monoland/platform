<?php

namespace App\Http\Resources\Account;

use Illuminate\Http\Resources\Json\JsonResource;

class AppsResource extends JsonResource
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
            'product_logo' => $this->product_logo,
            'product_name' => $this->product_name,
            'product_theme' => $this->product_theme,
            'text_color' => $this->text_color,
            'welcome_text' => $this->welcome_text,
            'workunit_name' => $this->workunit_name,
            'workunit_region' => $this->workunit_region,
            'device_name' => $request->header('User-Agent'),
        ];
    }
}
