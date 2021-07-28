const route = {
	path: '/paidleave',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "paidleave-module" */ '@modules/paidleave/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'paidleave-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'paidleave-dashboard',
			component: () => import(/* webpackChunkName: "paidleave-module" */ '@modules/paidleave/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "paidleave-module" */ '@modules/paidleave/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'paidleave-faith',
		// 			component: () => import(/* webpackChunkName: "paidleave-module" */ '@modules/paidleave/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'paidleave-faith-create',
		// 			component: () => import(/* webpackChunkName: "paidleave-module" */ '@modules/paidleave/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'paidleave-faith-show',
		// 			component: () => import(/* webpackChunkName: "paidleave-module" */ '@modules/paidleave/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'paidleave-faith-edit',
		// 			component: () => import(/* webpackChunkName: "paidleave-module" */ '@modules/paidleave/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;