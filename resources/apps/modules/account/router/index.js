const route = {
	path: '/account',
	component: () => import(/* webpackChunkName: "account-module" */ '@modules/account/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'account-login'}
		},

		{
			path: 'login',
			name: 'account-login',
			component: () => import(/* webpackChunkName: "account-module" */ '@modules/account/pages/login'),
		},

		{
			path: 'password',
			name: 'account-password',
			component: () => import(/* webpackChunkName: "account-module" */ '@modules/account/pages/password'),
		},

		{
			path: 'authent',
			name: 'account-authent',
			component: () => import(/* webpackChunkName: "account-module" */ '@modules/account/pages/authent'),
		}
	]
};

export default route;