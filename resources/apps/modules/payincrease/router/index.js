const route = {
	path: '/payincrease',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "payincrease-module" */ '@modules/payincrease/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'payincrease-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'payincrease-dashboard',
			component: () => import(/* webpackChunkName: "payincrease-module" */ '@modules/payincrease/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "payincrease-module" */ '@modules/payincrease/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'payincrease-faith',
		// 			component: () => import(/* webpackChunkName: "payincrease-module" */ '@modules/payincrease/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'payincrease-faith-create',
		// 			component: () => import(/* webpackChunkName: "payincrease-module" */ '@modules/payincrease/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'payincrease-faith-show',
		// 			component: () => import(/* webpackChunkName: "payincrease-module" */ '@modules/payincrease/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'payincrease-faith-edit',
		// 			component: () => import(/* webpackChunkName: "payincrease-module" */ '@modules/payincrease/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;