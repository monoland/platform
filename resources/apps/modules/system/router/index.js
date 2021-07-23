const route = {
	path: '/system',
	meta: { requiredAuth: true },
	component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/Base.vue'),
	children: [
		{
			path: '',
			redirect: { name: 'system-dashboard'}
		},

		{
			path: 'dashboard',
			name: 'system-dashboard',
			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/dashboard'),
		},

		{
			path: 'module',
			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module'),
			children: [
				{
					path: '',
					name: 'system-module',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module/crud/index'),
				},

				{
					path: 'create',
					name: 'system-module-create',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module/crud/create')
				},

				{
					path: ':module',
					name: 'system-module-show',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module/crud/show')
				},
				
				{
					path: ':module/edit',
					name: 'system-module-edit',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module/crud/create')
				}
			]
		},

		{
			path: 'module/:module/ability',
			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-ability'),
			children: [
				{
					path: '',
					name: 'system-ability',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-ability/crud/index'),
				},

				{
					path: 'create',
					name: 'system-ability-create',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-ability/crud/create')
				},

				{
					path: ':ability',
					name: 'system-ability-show',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-ability/crud/show')
				},
				
				{
					path: ':ability/edit',
					name: 'system-ability-edit',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-ability/crud/create')
				}
			]
		},

		{
			path: 'module/:module/page',
			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page'),
			children: [
				{
					path: '',
					name: 'system-page',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page/crud/index'),
				},

				{
					path: 'create',
					name: 'system-page-create',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page/crud/create')
				},

				{
					path: ':page',
					name: 'system-page-show',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page/crud/show')
				},
				
				{
					path: ':page/edit',
					name: 'system-page-edit',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page/crud/create')
				}
			]
		},

		{
			path: 'module/:module/page/:page/permission',
			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page-permission'),
			children: [
				{
					path: '',
					name: 'system-permission',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page-permission/crud/index'),
				},

				{
					path: 'create',
					name: 'system-permission-create',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page-permission/crud/create')
				},

				{
					path: ':permission',
					name: 'system-permission-show',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page-permission/crud/show')
				},
				
				{
					path: ':permission/edit',
					name: 'system-permission-edit',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/module-page-permission/crud/create')
				}
			]
		},

		{
			path: 'role',
			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/role'),
			children: [
				{
					path: '',
					name: 'system-role',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/role/crud/index'),
				},

				{
					path: 'create',
					name: 'system-role-create',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/role/crud/create')
				},

				{
					path: ':role',
					name: 'system-role-show',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/role/crud/show')
				},
				
				{
					path: ':role/edit',
					name: 'system-role-edit',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/role/crud/create')
				}
			]
		},

		{
			path: 'setting',
			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/setting'),
			children: [
				{
					path: '',
					name: 'system-setting',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/setting/crud/index'),
				}
			]
		},

		{
			path: 'user',
			component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/user'),
			children: [
				{
					path: '',
					name: 'system-user',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/user/crud/index'),
				},

				{
					path: 'create',
					name: 'system-user-create',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/user/crud/create')
				},

				{
					path: ':user',
					name: 'system-user-show',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/user/crud/show')
				},
				
				{
					path: ':user/edit',
					name: 'system-user-edit',
					component: () => import(/* webpackChunkName: "system-module" */ '@modules/system/pages/user/crud/create')
				}
			]
		},
	]
};

export default route;