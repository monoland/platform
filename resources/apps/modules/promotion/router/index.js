const route = {
	path: '/promotion',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "promotion-module" */ '@modules/promotion/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'promotion-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'promotion-dashboard',
			component: () => import(/* webpackChunkName: "promotion-module" */ '@modules/promotion/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "promotion-module" */ '@modules/promotion/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'promotion-faith',
		// 			component: () => import(/* webpackChunkName: "promotion-module" */ '@modules/promotion/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'promotion-faith-create',
		// 			component: () => import(/* webpackChunkName: "promotion-module" */ '@modules/promotion/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'promotion-faith-show',
		// 			component: () => import(/* webpackChunkName: "promotion-module" */ '@modules/promotion/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'promotion-faith-edit',
		// 			component: () => import(/* webpackChunkName: "promotion-module" */ '@modules/promotion/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;