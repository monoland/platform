const route = {
	path: '/staffing',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "staffing-module" */ '@modules/staffing/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'staffing-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'staffing-dashboard',
			component: () => import(/* webpackChunkName: "staffing-module" */ '@modules/staffing/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "staffing-module" */ '@modules/staffing/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'staffing-faith',
		// 			component: () => import(/* webpackChunkName: "staffing-module" */ '@modules/staffing/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'staffing-faith-create',
		// 			component: () => import(/* webpackChunkName: "staffing-module" */ '@modules/staffing/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'staffing-faith-show',
		// 			component: () => import(/* webpackChunkName: "staffing-module" */ '@modules/staffing/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'staffing-faith-edit',
		// 			component: () => import(/* webpackChunkName: "staffing-module" */ '@modules/staffing/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;