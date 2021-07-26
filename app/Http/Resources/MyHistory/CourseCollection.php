<?php

namespace App\Http\Resources\MyHistory;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Cache;

class CourseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return CourseResource::collection($this->collection);
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
                'features' => Cache::rememberForever('features-myhistory-course-' . $currentUser->id, function () use ($currentUser) {
                    return [
                        'export' => $currentUser->hasAnyPermission('export-myhistory-course'),
                        'filter' => $currentUser->hasAnyPermission('filter-myhistory-course'),
                        'import' => $currentUser->hasAnyPermission('import-myhistory-course'),
                        'print' => $currentUser->hasAnyPermission('print-myhistory-course'),
                        'search' => $currentUser->hasAnyPermission('search-myhistory-course'),
                        'trashed' => $currentUser->hasAnyPermission('restore-myhistory-course', 'destroy-myhistory-course'),
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
                'parent' => $currentUser->getPageHasParent('myhistory-course'),

                /** the page parent slug */
                'parent_path' => $currentUser->getPageParentPath('myhistory-course'),

                /** the table header */
                'headers' => [
                    ['text' => 'Name', 'value' => 'name'],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime'],
                ],

                /** the page icon */
                'icon' => $currentUser->getPageIcon('myhistory-course'),

                /** the record key */
                'key' => 'id',

                /** the page links */
                /** ['icon' => 'assignment', 'text' => 'open examination', 'method' => 'examination'] */
                'links' => [],

                /** the page permission */
                /** ['create'] */
                'permissions' => $currentUser->hasPermission('create-myhistory-course') ? ['create'] : [],

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null
                ],

                /** the page title */
                'title' => $currentUser->getPageTitle('myhistory-course'),
            ]
        ];
    }
}
