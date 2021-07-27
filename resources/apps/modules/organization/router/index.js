const route = {
	path: '/organization',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'organization-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'organization-dashboard',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/dashboard'),
		},

		// {
		// 	path: 'faith',
		// 	component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/faith'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'organization-faith',
		// 			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/faith/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'organization-faith-create',
		// 			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/faith/crud/create')
		// 		},

		// 		{
		// 			path: ':faith',
		// 			name: 'organization-faith-show',
		// 			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/faith/crud/show')
		// 		},
				
		// 		{
		// 			path: ':faith/edit',
		// 			name: 'organization-faith-edit',
		// 			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/faith/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;