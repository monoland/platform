const route = {
	path: '/leader',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "leader-module" */ '@modules/leader/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'leader-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'leader-dashboard',
			component: () => import(/* webpackChunkName: "leader-module" */ '@modules/leader/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "leader-module" */ '@modules/leader/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'leader-faith',
		// 			component: () => import(/* webpackChunkName: "leader-module" */ '@modules/leader/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'leader-faith-create',
		// 			component: () => import(/* webpackChunkName: "leader-module" */ '@modules/leader/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'leader-faith-show',
		// 			component: () => import(/* webpackChunkName: "leader-module" */ '@modules/leader/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'leader-faith-edit',
		// 			component: () => import(/* webpackChunkName: "leader-module" */ '@modules/leader/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;