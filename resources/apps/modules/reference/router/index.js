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

		// {
		// 	path: 'module',
		// 	component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'system-module',
		// 			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'system-module-create',
		// 			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module/crud/create')
		// 		},

		// 		{
		// 			path: ':module',
		// 			name: 'system-module-show',
		// 			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module/crud/show')
		// 		},
				
		// 		{
		// 			path: ':module/edit',
		// 			name: 'system-module-edit',
		// 			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;