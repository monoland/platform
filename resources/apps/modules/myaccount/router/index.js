const route = {
	path: '/myaccount',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'myaccount-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'myaccount-dashboard',
			component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/dashboard'),
		},

		{
			path: 'announcement',
			component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/announcement'),
			children: [
				{
					path: '',
					name: 'myaccount-announcement',
					component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/announcement/crud/index'),
				},

				{
					path: 'create',
					name: 'myaccount-announcement-create',
					component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/announcement/crud/create')
				},

				{
					path: ':announcement',
					name: 'myaccount-announcement-show',
					component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/announcement/crud/show')
				},
				
				{
					path: ':announcement/edit',
					name: 'myaccount-announcement-edit',
					component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/announcement/crud/create')
				}
			]
		},

		{
			path: 'notification',
			component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/notification'),
			children: [
				{
					path: '',
					name: 'myaccount-notification',
					component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/notification/crud/index'),
				}
			]
		},

		{
			path: 'profile',
			component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/profile'),
			children: [
				{
					path: '',
					name: 'myaccount-profile',
					component: () => import(/* webpackChunkName: "myaccount-module" */ '@modules/myaccount/pages/profile/crud/index'),
				}
			]
		},
	]
};

export default route;