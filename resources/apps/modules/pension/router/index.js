const route = {
	path: '/pension',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "pension-module" */ '@modules/pension/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'pension-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'pension-dashboard',
			component: () => import(/* webpackChunkName: "pension-module" */ '@modules/pension/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "pension-module" */ '@modules/pension/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'pension-faith',
		// 			component: () => import(/* webpackChunkName: "pension-module" */ '@modules/pension/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'pension-faith-create',
		// 			component: () => import(/* webpackChunkName: "pension-module" */ '@modules/pension/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'pension-faith-show',
		// 			component: () => import(/* webpackChunkName: "pension-module" */ '@modules/pension/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'pension-faith-edit',
		// 			component: () => import(/* webpackChunkName: "pension-module" */ '@modules/pension/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;