const route = {
	path: '/myhistory',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'myhistory-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'myhistory-dashboard',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/dashboard'),
		},

		{
			path: 'status',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/status'),
			children: [
				{
					path: '',
					name: 'myhistory-status',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/status/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-status-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/status/crud/create')
				},

				{
					path: ':status',
					name: 'myhistory-status-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/status/crud/show')
				},
				
				{
					path: ':status/edit',
					name: 'myhistory-status-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/status/crud/create')
				}
			]
		},

		{
			path: 'section',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/section'),
			children: [
				{
					path: '',
					name: 'myhistory-section',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/section/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-section-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/section/crud/create')
				},

				{
					path: ':section',
					name: 'myhistory-section-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/section/crud/show')
				},
				
				{
					path: ':section/edit',
					name: 'myhistory-section-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/section/crud/create')
				}
			]
		},

		{
			path: 'education',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/education'),
			children: [
				{
					path: '',
					name: 'myhistory-education',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/education/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-education-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/education/crud/create')
				},

				{
					path: ':education',
					name: 'myhistory-education-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/education/crud/show')
				},
				
				{
					path: ':education/edit',
					name: 'myhistory-education-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/education/crud/create')
				}
			]
		},

		{
			path: 'position',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/position'),
			children: [
				{
					path: '',
					name: 'myhistory-position',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/position/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-position-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/position/crud/create')
				},

				{
					path: ':position',
					name: 'myhistory-position-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/position/crud/show')
				},
				
				{
					path: ':position/edit',
					name: 'myhistory-position-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/position/crud/create')
				}
			]
		},

		{
			path: 'review',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/review'),
			children: [
				{
					path: '',
					name: 'myhistory-review',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/review/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-review-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/review/crud/create')
				},

				{
					path: ':review',
					name: 'myhistory-review-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/review/crud/show')
				},
				
				{
					path: ':review/edit',
					name: 'myhistory-review-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/review/crud/create')
				}
			]
		},

		{
			path: 'course',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/course'),
			children: [
				{
					path: '',
					name: 'myhistory-course',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/course/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-course-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/course/crud/create')
				},

				{
					path: ':course',
					name: 'myhistory-course-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/course/crud/show')
				},
				
				{
					path: ':course/edit',
					name: 'myhistory-course-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/course/crud/create')
				}
			]
		},

		{
			path: 'family',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/family'),
			children: [
				{
					path: '',
					name: 'myhistory-family',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/family/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-family-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/family/crud/create')
				},

				{
					path: ':family',
					name: 'myhistory-family-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/family/crud/show')
				},
				
				{
					path: ':family/edit',
					name: 'myhistory-family-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/family/crud/create')
				}
			]
		},

		{
			path: 'goals',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/goals'),
			children: [
				{
					path: '',
					name: 'myhistory-goals',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/goals/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-goals-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/goals/crud/create')
				},

				{
					path: ':goals',
					name: 'myhistory-goals-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/goals/crud/show')
				},
				
				{
					path: ':goals/edit',
					name: 'myhistory-goals-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/goals/crud/create')
				}
			]
		},

		{
			path: 'award',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/award'),
			children: [
				{
					path: '',
					name: 'myhistory-award',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/award/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-award-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/award/crud/create')
				},

				{
					path: ':award',
					name: 'myhistory-award-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/award/crud/show')
				},
				
				{
					path: ':award/edit',
					name: 'myhistory-award-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/award/crud/create')
				}
			]
		},

		{
			path: 'organization',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/organization'),
			children: [
				{
					path: '',
					name: 'myhistory-organization',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/organization/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-organization-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/organization/crud/create')
				},

				{
					path: ':organization',
					name: 'myhistory-organization-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/organization/crud/show')
				},
				
				{
					path: ':organization/edit',
					name: 'myhistory-organization-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/organization/crud/create')
				}
			]
		},

		{
			path: 'cltn',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/cltn'),
			children: [
				{
					path: '',
					name: 'myhistory-cltn',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/cltn/crud/index'),
				},

				{
					path: 'create',
					name: 'myhistory-cltn-create',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/cltn/crud/create')
				},

				{
					path: ':cltn',
					name: 'myhistory-cltn-show',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/cltn/crud/show')
				},
				
				{
					path: ':cltn/edit',
					name: 'myhistory-cltn-edit',
					component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/cltn/crud/create')
				}
			]
		},
	]
};

export default route;