<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Cache;

class FunctionalreadCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return FunctionalreadResource::collection($this->collection);
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
                'features' => Cache::rememberForever('features-organization-functionalread-' . $currentUser->id, function () use ($currentUser) {
                    return [
                        'export' => $currentUser->hasAnyPermission('export-organization-functionalread'),
                        'filter' => $currentUser->hasAnyPermission('filter-organization-functionalread'),
                        'import' => $currentUser->hasAnyPermission('import-organization-functionalread'),
                        'print' => $currentUser->hasAnyPermission('print-organization-functionalread'),
                        'search' => $currentUser->hasAnyPermission('search-organization-functionalread'),
                        'trashed' => $currentUser->hasAnyPermission('restore-organization-functionalread', 'destroy-organization-functionalread'),
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
                'parent' => $currentUser->getPageHasParent('organization-functionalread'),

                /** the page parent slug */
                'parent_path' => $currentUser->getPageParentPath('organization-functionalread'),

                /** the table header */
                'headers' => [
                    ['text' => 'Name', 'value' => 'name'],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime'],
                ],

                /** the page icon */
                'icon' => $currentUser->getPageIcon('organization-functionalread'),

                /** the record key */
                'key' => 'id',

                /** the page links */
                /** ['icon' => 'assignment', 'text' => 'open examination', 'method' => 'examination'] */
                'links' => [],

                /** the page permission */
                /** ['create'] */
                'permissions' => $currentUser->hasPermission('create-organization-functionalread') ? ['create'] : [],

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null
                ],

                /** the page title */
                'title' => $currentUser->getPageTitle('organization-functionalread'),
            ]
        ];
    }
}
