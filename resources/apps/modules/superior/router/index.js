const route = {
	path: '/superior',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "superior-module" */ '@modules/superior/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'superior-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'superior-dashboard',
			component: () => import(/* webpackChunkName: "superior-module" */ '@modules/superior/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "superior-module" */ '@modules/superior/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'superior-faith',
		// 			component: () => import(/* webpackChunkName: "superior-module" */ '@modules/superior/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'superior-faith-create',
		// 			component: () => import(/* webpackChunkName: "superior-module" */ '@modules/superior/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'superior-faith-show',
		// 			component: () => import(/* webpackChunkName: "superior-module" */ '@modules/superior/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'superior-faith-edit',
		// 			component: () => import(/* webpackChunkName: "superior-module" */ '@modules/superior/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;