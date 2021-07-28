const route = {
	path: '/development',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "development-module" */ '@modules/development/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'development-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'development-dashboard',
			component: () => import(/* webpackChunkName: "development-module" */ '@modules/development/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "development-module" */ '@modules/development/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'development-faith',
		// 			component: () => import(/* webpackChunkName: "development-module" */ '@modules/development/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'development-faith-create',
		// 			component: () => import(/* webpackChunkName: "development-module" */ '@modules/development/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'development-faith-show',
		// 			component: () => import(/* webpackChunkName: "development-module" */ '@modules/development/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'development-faith-edit',
		// 			component: () => import(/* webpackChunkName: "development-module" */ '@modules/development/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;