const route = {
	path: '/myhistory',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'myhistory-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'myhistory-dashboard',
			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'myhistory-faith',
		// 			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'myhistory-faith-create',
		// 			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'myhistory-faith-show',
		// 			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'myhistory-faith-edit',
		// 			component: () => import(/* webpackChunkName: "myhistory-module" */ '@modules/myhistory/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;