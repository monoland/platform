const route = {
	path: '/myservice',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'myservice-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'myservice-dashboard',
			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/dashboard'),
		},

		// {
		// 	path: 'document',
		// 	component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/document'),
		// 	children: [
		// 		{
		// 			path: '',
		// 			name: 'myservice-document',
		// 			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/document/crud/index'),
		// 		},

		// 		{
		// 			path: 'create',
		// 			name: 'myservice-document-create',
		// 			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/document/crud/create')
		// 		},

		// 		{
		// 			path: ':document',
		// 			name: 'myservice-document-show',
		// 			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/document/crud/show')
		// 		},
				
		// 		{
		// 			path: ':document/edit',
		// 			name: 'myservice-document-edit',
		// 			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/document/crud/create')
		// 		}
		// 	]
		// },
	]
};

export default route;