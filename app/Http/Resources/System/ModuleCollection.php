<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Cache;

class ModuleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ModuleResource::collection($this->collection);
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

        $currentUser = $request->user();

        return [
            'setups' => [
                /** the page combo */
                'combos' => [],

                /** the page data mode */
                /** default | nested | single | trashed */
                'mode' => $request->mode,

                /** the page enable fitur */
                'features' => Cache::rememberForever('features-system-module-' . $currentUser->id, function () use ($currentUser) {
                    return [
                        'export' => $currentUser->hasAnyPermission('export-system-module'),
                        'filter' => $currentUser->hasAnyPermission('filter-system-module'),
                        'import' => $currentUser->hasAnyPermission('import-system-module'),
                        'print' => $currentUser->hasAnyPermission('print-system-module'),
                        'search' => $currentUser->hasAnyPermission('search-system-module'),
                        'trashed' => $currentUser->hasAnyPermission('restore-system-module', 'destroy-system-module'),
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
                    ['text' => 'Icon', 'value' => 'icon', 'align' => 'center', 'filterable' => false, 'sortable' => false, 'width' => 80],
                    ['text' => 'Name', 'value' => 'name'],
                    ['text' => 'Path', 'value' => 'path'],
                    ['text' => 'Theme', 'value' => 'color', 'align' => 'center', 'filterable' => false, 'sortable' => false, 'width' => 80],
                    ['text' => 'Visible', 'value' => 'visibility', 'align' => 'center', 'filterable' => false, 'sortable' => false, 'width' => 80],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime'],
                ],

                /** the page icon */
                'icon' => $currentUser->getPageIcon('system-module'),

                /** the record key */
                'key' => 'id',

                /** the page links */
                /** ['icon' => 'assignment', 'text' => 'open examination', 'method' => 'examination'] */
                'links' => [],

                /** the page permission */
                /** ['create' => bool, 'update' => bool, 'delete' => bool, 'restore' => bool, 'destroy' => bool] */
                'permissions' => $currentUser->hasPermission('create-system-module') ? ['create'] : [],

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null,
                    'icon' => null,
                    'color' => null,
                    'path' => null,
                    'visibility' => null,
                    'describe' => null,
                ],

                /** the page title */
                'title' => $currentUser->getPageTitle('system-module'),
            ]
        ];
    }
}
