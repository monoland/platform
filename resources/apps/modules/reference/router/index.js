const route = {
	path: '/reference',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'reference-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'reference-dashboard',
			component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/dashboard'),
		},

		{
			path: 'faith',
			component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/faith'),
			children: [
				{
					path: '',
					name: 'reference-faith',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/faith/crud/index'),
				},

				{
					path: 'create',
					name: 'reference-faith-create',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/faith/crud/create')
				},

				{
					path: ':faith',
					name: 'reference-faith-show',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/faith/crud/show')
				},
				
				{
					path: ':faith/edit',
					name: 'reference-faith-edit',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/faith/crud/create')
				}
			]
		},

		{
			path: 'echelonmap',
			component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelonmap'),
			children: [
				{
					path: '',
					name: 'reference-echelonmap',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelonmap/crud/index'),
				},

				{
					path: 'create',
					name: 'reference-echelonmap-create',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelonmap/crud/create')
				},

				{
					path: ':echelonmap',
					name: 'reference-echelonmap-show',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelonmap/crud/show')
				},
				
				{
					path: ':echelonmap/edit',
					name: 'reference-echelonmap-edit',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelonmap/crud/create')
				}
			]
		},

		{
			path: 'echelonmap/:echelonmap/echelon',
			component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelon'),
			children: [
				{
					path: '',
					name: 'reference-echelon',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelon/crud/index'),
				},

				{
					path: 'create',
					name: 'reference-echelon-create',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelon/crud/create')
				},

				{
					path: ':echelon',
					name: 'reference-echelon-show',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelon/crud/show')
				},
				
				{
					path: ':echelon/edit',
					name: 'reference-echelon-edit',
					component: () => import(/* webpackChunkName: "reference-module" */ '@modules/reference/pages/echelon/crud/create')
				}
			]
		},
	]
};

export default route;