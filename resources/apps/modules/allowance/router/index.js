const route = {
	path: '/allowance',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "allowance-module" */ '@modules/allowance/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'allowance-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'allowance-dashboard',
			component: () => import(/* webpackChunkName: "allowance-module" */ '@modules/allowance/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "allowance-module" */ '@modules/allowance/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'allowance-faith',
		// 			component: () => import(/* webpackChunkName: "allowance-module" */ '@modules/allowance/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'allowance-faith-create',
		// 			component: () => import(/* webpackChunkName: "allowance-module" */ '@modules/allowance/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'allowance-faith-show',
		// 			component: () => import(/* webpackChunkName: "allowance-module" */ '@modules/allowance/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'allowance-faith-edit',
		// 			component: () => import(/* webpackChunkName: "allowance-module" */ '@modules/allowance/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;