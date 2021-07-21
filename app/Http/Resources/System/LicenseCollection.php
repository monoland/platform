<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Cache;

class LicenseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return LicenseResource::collection($this->collection);
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function with($request)
    {
        if (!$request->has('initialized')) {
            return [];
        }

        return [
            'setups' => [
                /** the page combo */
                'combos' => [],

                /** the page data mode */
                /** default | nested | single | trashed */
                'mode' => $request->mode,

                /** the page enable fitur */
                'features' => Cache::rememberForever('features-system-license-' . $request->user()->id, function () use ($request) {
                    return [
                        'export' => $request->user()->hasAnyPermission('export-system-license'),
                        'filter' => $request->user()->hasAnyPermission('filter-system-license'),
                        'import' => $request->user()->hasAnyPermission('import-system-license'),
                        'print' => $request->user()->hasAnyPermission('print-system-license'),
                        'search' => $request->user()->hasAnyPermission('search-system-license'),
                        'trashed' => $request->user()->hasAnyPermission('restore-system-license', 'destroy-system-license'),
                    ];
                }),

                /** the page data filter */
                'filters' => [
                    // [
                    //     'data' => null,
                    //     'operators' => [],
                    //     'text' => null,
                    //     'used' => false,
                    //     'maps' => [],
                    //     'value' => [
                    //         'filterOn' => null,
                    //         'filterBy' => null,
                    //         'filterOp' => null
                    //     ]
                    // ],
                ],

                /** the page find-by */
                'finds' => ['name'],

                /** the page is parent ? */
                'parent' => true,

                /** the table header */
                'headers' => [
                    ['text' => 'Name', 'value' => 'name'],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime'],
                ],

                /** the page icon */
                'icon' => $request->user()->getPageIcon('system-license'),

                /** the record key */
                'key' => 'id',

                /** the page links */
                /** ['icon' => 'assignment', 'text' => 'open examination', 'method' => 'examination'] */
                'links' => [],

                /** the page permission */
                /** ['create' => bool, 'update' => bool, 'delete' => bool, 'restore' => bool, 'destroy' => bool] */
                'permissions' => $request->user()->getPermissionOnPage('system-license'),

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null
                ],

                /** the page title */
                'title' => $request->user()->getPageTitle('system-license'),
            ]
        ];
    }
}
