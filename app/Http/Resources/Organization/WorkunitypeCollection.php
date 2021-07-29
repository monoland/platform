<?php

namespace App\Http\Resources\Organization;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Cache;

class WorkunitypeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return WorkunitypeResource::collection($this->collection);
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
                'features' => Cache::rememberForever('features-organization-workunitype-' . $currentUser->id, function () use ($currentUser) {
                    return [
                        'export' => $currentUser->hasAnyPermission('export-organization-workunitype'),
                        'filter' => $currentUser->hasAnyPermission('filter-organization-workunitype'),
                        'import' => $currentUser->hasAnyPermission('import-organization-workunitype'),
                        'print' => $currentUser->hasAnyPermission('print-organization-workunitype'),
                        'search' => $currentUser->hasAnyPermission('search-organization-workunitype'),
                        'trashed' => $currentUser->hasAnyPermission('restore-organization-workunitype', 'destroy-organization-workunitype'),
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
                'parent' => $currentUser->getPageHasParent('organization-workunitype'),

                /** the page parent slug */
                'parent_path' => $currentUser->getPageParentPath('organization-workunitype'),

                /** the table header */
                'headers' => [
                    ['text' => 'Name', 'value' => 'name'],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime'],
                ],

                /** the page icon */
                'icon' => $currentUser->getPageIcon('organization-workunitype'),

                /** the record key */
                'key' => 'id',

                /** the page links */
                /** ['icon' => 'assignment', 'text' => 'open examination', 'method' => 'examination'] */
                'links' => [],

                /** the page permission */
                /** ['create'] */
                'permissions' => $currentUser->hasPermission('create-organization-workunitype') ? ['create'] : [],

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null
                ],

                /** the page title */
                'title' => $currentUser->getPageTitle('organization-workunitype'),
            ]
        ];
    }
}
