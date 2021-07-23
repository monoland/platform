<?php

namespace App\Http\Resources\System;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Cache;

class PageCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return PageResource::collection($this->collection);
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
                'features' => Cache::rememberForever('features-system-page-' . $currentUser->id, function () use ($currentUser) {
                    return [
                        'export' => $currentUser->hasAnyPermission('export-system-page'),
                        'filter' => $currentUser->hasAnyPermission('filter-system-page'),
                        'import' => $currentUser->hasAnyPermission('import-system-page'),
                        'print' => $currentUser->hasAnyPermission('print-system-page'),
                        'search' => $currentUser->hasAnyPermission('search-system-page'),
                        'trashed' => $currentUser->hasAnyPermission('restore-system-page', 'destroy-system-page'),
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
                'parent' => $currentUser->getPageHasParent('system-page'),

                /** the page parent slug */
                'parent_path' => $currentUser->getPageParentPath('system-page'),

                /** the table header */
                'headers' => [
                    ['text' => 'Icon', 'value' => 'icon', 'align' => 'center', 'filterable' => false, 'sortable' => false, 'width' => 80],
                    ['text' => 'Name', 'value' => 'name'],
                    ['text' => 'Slug', 'value' => 'slug'],
                    ['text' => 'Prefix', 'value' => 'prefix'],
                    ['text' => 'Path', 'value' => 'path'],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime'],
                ],

                /** the page icon */
                'icon' => $currentUser->getPageIcon('system-page'),

                /** the record key */
                'key' => 'id',

                /** the page links */
                /** ['icon' => 'assignment', 'text' => 'open examination', 'method' => 'examination'] */
                'links' => [],

                /** the page permission */
                /** ['create' => bool, 'update' => bool, 'delete' => bool, 'restore' => bool, 'destroy' => bool] */
                'permissions' => $currentUser->hasPermission('create-system-page') ? ['create'] : [],

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null,
                    'icon' => null,
                    'prefix' => null,
                    'path' => null,
                    'describe' => null,
                    'side' => false,
                    'dock' => false,
                    'parent_id' => null,
                ],

                /** the page title */
                'title' => $currentUser->getPageTitle('system-page'),
            ]
        ];
    }
}
