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
	]
};

export default route;