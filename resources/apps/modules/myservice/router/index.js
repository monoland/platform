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

		{
			path: 'paidleave',
			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/paidleave'),
			children: [
				{
					path: '',
					name: 'myservice-paidleave',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/paidleave/crud/index'),
				},

				{
					path: 'create',
					name: 'myservice-paidleave-create',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/paidleave/crud/create')
				},

				{
					path: ':paidleave',
					name: 'myservice-paidleave-show',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/paidleave/crud/show')
				},
				
				{
					path: ':paidleave/edit',
					name: 'myservice-paidleave-edit',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/paidleave/crud/create')
				}
			]
		},

		{
			path: 'pension',
			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/pension'),
			children: [
				{
					path: '',
					name: 'myservice-pension',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/pension/crud/index'),
				},

				{
					path: 'create',
					name: 'myservice-pension-create',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/pension/crud/create')
				},

				{
					path: ':pension',
					name: 'myservice-pension-show',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/pension/crud/show')
				},
				
				{
					path: ':pension/edit',
					name: 'myservice-pension-edit',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/pension/crud/create')
				}
			]
		},

		{
			path: 'personcard',
			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/personcard'),
			children: [
				{
					path: '',
					name: 'myservice-personcard',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/personcard/crud/index'),
				},

				{
					path: 'create',
					name: 'myservice-personcard-create',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/personcard/crud/create')
				},

				{
					path: ':personcard',
					name: 'myservice-personcard-show',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/personcard/crud/show')
				},
				
				{
					path: ':personcard/edit',
					name: 'myservice-personcard-edit',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/personcard/crud/create')
				}
			]
		},

		{
			path: 'promotion',
			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/promotion'),
			children: [
				{
					path: '',
					name: 'myservice-promotion',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/promotion/crud/index'),
				},

				{
					path: 'create',
					name: 'myservice-promotion-create',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/promotion/crud/create')
				},

				{
					path: ':promotion',
					name: 'myservice-promotion-show',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/promotion/crud/show')
				},
				
				{
					path: ':promotion/edit',
					name: 'myservice-promotion-edit',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/promotion/crud/create')
				}
			]
		},

		{
			path: 'couplecard',
			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/couplecard'),
			children: [
				{
					path: '',
					name: 'myservice-couplecard',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/couplecard/crud/index'),
				},

				{
					path: 'create',
					name: 'myservice-couplecard-create',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/couplecard/crud/create')
				},

				{
					path: ':couplecard',
					name: 'myservice-couplecard-show',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/couplecard/crud/show')
				},
				
				{
					path: ':couplecard/edit',
					name: 'myservice-couplecard-edit',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/couplecard/crud/create')
				}
			]
		},

		{
			path: 'payincrease',
			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/payincrease'),
			children: [
				{
					path: '',
					name: 'myservice-payincrease',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/payincrease/crud/index'),
				},

				{
					path: 'create',
					name: 'myservice-payincrease-create',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/payincrease/crud/create')
				},

				{
					path: ':payincrease',
					name: 'myservice-payincrease-show',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/payincrease/crud/show')
				},
				
				{
					path: ':payincrease/edit',
					name: 'myservice-payincrease-edit',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/payincrease/crud/create')
				}
			]
		},

		{
			path: 'divorce',
			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/divorce'),
			children: [
				{
					path: '',
					name: 'myservice-divorce',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/divorce/crud/index'),
				},

				{
					path: 'create',
					name: 'myservice-divorce-create',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/divorce/crud/create')
				},

				{
					path: ':divorce',
					name: 'myservice-divorce-show',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/divorce/crud/show')
				},
				
				{
					path: ':divorce/edit',
					name: 'myservice-divorce-edit',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/divorce/crud/create')
				}
			]
		},

		{
			path: 'inclusion',
			component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/inclusion'),
			children: [
				{
					path: '',
					name: 'myservice-inclusion',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/inclusion/crud/index'),
				},

				{
					path: 'create',
					name: 'myservice-inclusion-create',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/inclusion/crud/create')
				},

				{
					path: ':inclusion',
					name: 'myservice-inclusion-show',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/inclusion/crud/show')
				},
				
				{
					path: ':inclusion/edit',
					name: 'myservice-inclusion-edit',
					component: () => import(/* webpackChunkName: "myservice-module" */ '@modules/myservice/pages/inclusion/crud/create')
				}
			]
		},
	]
};

export default route;