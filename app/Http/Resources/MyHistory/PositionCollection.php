<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Cache;

class PositionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return PositionResource::collection($this->collection);
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
                'features' => Cache::rememberForever('features-myhistory-position-' . $currentUser->id, function () use ($currentUser) {
                    return [
                        'export' => $currentUser->hasAnyPermission('export-myhistory-position'),
                        'filter' => $currentUser->hasAnyPermission('filter-myhistory-position'),
                        'import' => $currentUser->hasAnyPermission('import-myhistory-position'),
                        'print' => $currentUser->hasAnyPermission('print-myhistory-position'),
                        'search' => $currentUser->hasAnyPermission('search-myhistory-position'),
                        'trashed' => $currentUser->hasAnyPermission('restore-myhistory-position', 'destroy-myhistory-position'),
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
                'parent' => $currentUser->getPageHasParent('myhistory-position'),

                /** the page parent slug */
                'parent_path' => $currentUser->getPageParentPath('myhistory-position'),

                /** the table header */
                'headers' => [
                    ['text' => 'Name', 'value' => 'name'],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime'],
                ],

                /** the page icon */
                'icon' => $currentUser->getPageIcon('myhistory-position'),

                /** the record key */
                'key' => 'id',

                /** the page links */
                /** ['icon' => 'assignment', 'text' => 'open examination', 'method' => 'examination'] */
                'links' => [],

                /** the page permission */
                /** ['create'] */
                'permissions' => $currentUser->hasPermission('create-myhistory-position') ? ['create'] : [],

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null
                ],

                /** the page title */
                'title' => $currentUser->getPageTitle('myhistory-position'),
            ]
        ];
    }
}
