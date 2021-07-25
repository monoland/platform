const route = {
	path: '/myprofile',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'myprofile-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'myprofile-dashboard',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'myprofile-faith',
		// 			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'myprofile-faith-create',
		// 			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'myprofile-faith-show',
		// 			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'myprofile-faith-edit',
		// 			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;