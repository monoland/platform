<?php

namespace App\Http\Resources\MyAccount;

use App\Models\System\Role;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AnnouncementCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return AnnouncementResource::collection($this->collection);
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
                'features' => Cache::rememberForever('features-myaccount-announcement-' . $currentUser->id, function () use ($currentUser) {
                    return [
                        'export' => $currentUser->hasAnyPermission('export-myaccount-announcement'),
                        'filter' => $currentUser->hasAnyPermission('filter-myaccount-announcement'),
                        'import' => $currentUser->hasAnyPermission('import-myaccount-announcement'),
                        'print' => $currentUser->hasAnyPermission('print-myaccount-announcement'),
                        'search' => $currentUser->hasAnyPermission('search-myaccount-announcement'),
                        'trashed' => $currentUser->hasAnyPermission('restore-myaccount-announcement', 'destroy-myaccount-announcement'),
                    ];
                }),

                /** the page data filter */
                'filters' => [
                    [
                        'data' => Role::fetchCombo(),
                        'operators' => ['=', '!='],
                        'text' => 'wewenang',
                        'used' => false,
                        'maps' => [],
                        'value' => [
                            'filterOn' => 'role_id',
                            'filterBy' => null,
                            'filterOp' => null
                        ]
                    ],

                    [
                        'data' => Role::fetchCombo(),
                        'operators' => ['=', '!='],
                        'text' => 'otorisasi',
                        'used' => false,
                        'maps' => [],
                        'value' => [
                            'filterOn' => 'role_id',
                            'filterBy' => null,
                            'filterOp' => null
                        ]
                    ],
                ],

                /** the page find-by */
                'finds' => ['title'],

                /** the page is parent ? */
                'parent' => true,

                /** the table header */
                'headers' => [
                    ['text' => 'Title', 'value' => 'title'],
                    ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime'],
                ],

                /** the page icon */
                'icon' => $currentUser->getPageIcon('myaccount-announcement'),

                /** the record key */
                'key' => 'id',

                /** the page links */
                /** ['icon' => 'assignment', 'text' => 'open examination', 'method' => 'examination'] */
                'links' => [],

                /** the page permission */
                /** ['create' => bool, 'update' => bool, 'delete' => bool, 'restore' => bool, 'destroy' => bool] */
                'permissions' => $currentUser->hasPermission('create-myaccount-announcement') ? ['create'] : [],

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'title' => null,
                    'article' => null,
                ],

                /** the page title */
                'title' => $currentUser->getPageTitle('myaccount-announcement'),
            ]
        ];
    }
}
