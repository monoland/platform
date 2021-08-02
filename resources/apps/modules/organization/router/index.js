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

		{
			path: 'emptiness',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/emptiness'),
			children: [
				{
					path: '',
					name: 'organization-emptiness',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/emptiness/crud/index'),
				},

				{
					path: ':emptiness',
					name: 'organization-emptiness-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/emptiness/crud/show')
				}
			]
		},

		{
			path: 'anomaly',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/anomaly'),
			children: [
				{
					path: '',
					name: 'organization-anomaly',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/anomaly/crud/index'),
				},

				{
					path: ':anomaly',
					name: 'organization-anomaly-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/anomaly/crud/show')
				}
			]
		},

		{
			path: 'excess',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/excess'),
			children: [
				{
					path: '',
					name: 'organization-excess',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/excess/crud/index'),
				},
				
				{
					path: ':excess',
					name: 'organization-excess-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/excess/crud/show')
				}
			]
		},

		{
			path: 'report',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/report'),
			children: [
				{
					path: '',
					name: 'organization-report',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/report/crud/index'),
				},
			]
		},

		{
			path: 'positionmap',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionmap'),
			children: [
				{
					path: '',
					name: 'organization-positionmap',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionmap/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-positionmap-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionmap/crud/create')
				},

				{
					path: ':positionmap',
					name: 'organization-positionmap-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionmap/crud/show')
				},
				
				{
					path: ':positionmap/edit',
					name: 'organization-positionmap-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionmap/crud/create')
				}
			]
		},

		{
			path: 'positionmap/:positionmap/positiontype',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positiontype'),
			children: [
				{
					path: '',
					name: 'organization-positiontype',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positiontype/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-positiontype-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positiontype/crud/create')
				},

				{
					path: ':positiontype',
					name: 'organization-positiontype-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positiontype/crud/show')
				},
				
				{
					path: ':positiontype/edit',
					name: 'organization-positiontype-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positiontype/crud/create')
				}
			]
		},

		{
			path: 'positionkind',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionkind'),
			children: [
				{
					path: '',
					name: 'organization-positionkind',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionkind/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-positionkind-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionkind/crud/create')
				},

				{
					path: ':positionkind',
					name: 'organization-positionkind-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionkind/crud/show')
				},
				
				{
					path: ':positionkind/edit',
					name: 'organization-positionkind-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/positionkind/crud/create')
				}
			]
		},

		{
			path: 'functionalstage',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalstage'),
			children: [
				{
					path: '',
					name: 'organization-functionalstage',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalstage/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-functionalstage-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalstage/crud/create')
				},

				{
					path: ':functionalstage',
					name: 'organization-functionalstage-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalstage/crud/show')
				},
				
				{
					path: ':functionalstage/edit',
					name: 'organization-functionalstage-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalstage/crud/create')
				}
			]
		},

		{
			path: 'functionalstage/:functionalstage/functionalgrade',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalgrade'),
			children: [
				{
					path: '',
					name: 'organization-functionalgrade',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalgrade/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-functionalgrade-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalgrade/crud/create')
				},

				{
					path: ':functionalgrade',
					name: 'organization-functionalgrade-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalgrade/crud/show')
				},
				
				{
					path: ':functionalgrade/edit',
					name: 'organization-functionalgrade-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalgrade/crud/create')
				}
			]
		},

		{
			path: 'functionalmap',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalmap'),
			children: [
				{
					path: '',
					name: 'organization-functionalmap',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalmap/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-functionalmap-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalmap/crud/create')
				},

				{
					path: ':functionalmap',
					name: 'organization-functionalmap-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalmap/crud/show')
				},
				
				{
					path: ':functionalmap/edit',
					name: 'organization-functionalmap-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalmap/crud/create')
				}
			]
		},

		{
			path: 'functionalmap/:functionalmap/functionalexpert',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalexpert'),
			children: [
				{
					path: '',
					name: 'organization-functionalexpert',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalexpert/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-functionalexpert-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalexpert/crud/create')
				},

				{
					path: ':functionalexpert',
					name: 'organization-functionalexpert-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalexpert/crud/show')
				},
				
				{
					path: ':functionalexpert/edit',
					name: 'organization-functionalexpert-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalexpert/crud/create')
				}
			]
		},

		{
			path: 'functionalmap/:functionalmap/functional',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functional'),
			children: [
				{
					path: '',
					name: 'organization-functional',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functional/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-functional-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functional/crud/create')
				},

				{
					path: ':functional',
					name: 'organization-functional-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functional/crud/show')
				},
				
				{
					path: ':functional/edit',
					name: 'organization-functional-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functional/crud/create')
				}
			]
		},

		{
			path: 'functionalread',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalread'),
			children: [
				{
					path: '',
					name: 'organization-functionalread',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalread/crud/index'),
				},

				{
					path: ':functionalread',
					name: 'organization-functionalread-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/functionalread/crud/show')
				}
			]
		},

		{
			path: 'executor',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/executor'),
			children: [
				{
					path: '',
					name: 'organization-executor',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/executor/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-executor-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/executor/crud/create')
				},

				{
					path: ':executor',
					name: 'organization-executor-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/executor/crud/show')
				},
				
				{
					path: ':executor/edit',
					name: 'organization-executor-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/executor/crud/create')
				}
			]
		},

		{
			path: 'echelonmap',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echelonmap'),
			children: [
				{
					path: '',
					name: 'organization-echelonmap',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echelonmap/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-echelonmap-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echelonmap/crud/create')
				},

				{
					path: ':echelonmap',
					name: 'organization-echelonmap-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echelonmap/crud/show')
				},
				
				{
					path: ':echelonmap/edit',
					name: 'organization-echelonmap-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echelonmap/crud/create')
				}
			]
		},

		{
			path: 'echhelon',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echhelon'),
			children: [
				{
					path: '',
					name: 'organization-echhelon',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echhelon/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-echhelon-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echhelon/crud/create')
				},

				{
					path: ':echhelon',
					name: 'organization-echhelon-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echhelon/crud/show')
				},
				
				{
					path: ':echhelon/edit',
					name: 'organization-echhelon-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/echhelon/crud/create')
				}
			]
		},

		{
			path: 'structural',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/structural'),
			children: [
				{
					path: '',
					name: 'organization-structural',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/structural/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-structural-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/structural/crud/create')
				},

				{
					path: ':structural',
					name: 'organization-structural-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/structural/crud/show')
				},
				
				{
					path: ':structural/edit',
					name: 'organization-structural-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/structural/crud/create')
				}
			]
		},

		{
			path: 'workunitype',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunitype'),
			children: [
				{
					path: '',
					name: 'organization-workunitype',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunitype/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-workunitype-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunitype/crud/create')
				},

				{
					path: ':workunitype',
					name: 'organization-workunitype-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunitype/crud/show')
				},
				
				{
					path: ':workunitype/edit',
					name: 'organization-workunitype-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunitype/crud/create')
				}
			]
		},

		{
			path: 'workunit',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunit'),
			children: [
				{
					path: '',
					name: 'organization-workunit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunit/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-workunit-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunit/crud/create')
				},

				{
					path: ':workunit',
					name: 'organization-workunit-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunit/crud/show')
				},
				
				{
					path: ':workunit/edit',
					name: 'organization-workunit-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunit/crud/create')
				}
			]
		},

		{
			path: 'workunitread',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunitread'),
			children: [
				{
					path: '',
					name: 'organization-workunitread',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunitread/crud/index'),
				},

				{
					path: ':workunitread',
					name: 'organization-workunitread-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/workunitread/crud/show')
				}
			]
		},

		{
			path: 'workunitread/:workunitread/composition',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/composition'),
			children: [
				{
					path: '',
					name: 'organization-composition',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/composition/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-composition-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/composition/crud/create')
				},

				{
					path: ':composition',
					name: 'organization-composition-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/composition/crud/show')
				},
				
				{
					path: ':composition/edit',
					name: 'organization-composition-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/composition/crud/create')
				}
			]
		},

		{
			path: 'workunitread/:workunitread/formation',
			component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/formation'),
			children: [
				{
					path: '',
					name: 'organization-formation',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/formation/crud/index'),
				},

				{
					path: 'create',
					name: 'organization-formation-create',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/formation/crud/create')
				},

				{
					path: ':formation',
					name: 'organization-formation-show',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/formation/crud/show')
				},
				
				{
					path: ':formation/edit',
					name: 'organization-formation-edit',
					component: () => import(/* webpackChunkName: "organization-module" */ '@modules/organization/pages/formation/crud/create')
				}
			]
		},
	]
};

export default route;