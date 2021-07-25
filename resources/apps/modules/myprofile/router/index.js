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

		{
			path: 'document',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/document'),
			children: [
				{
					path: '',
					name: 'myprofile-document',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/document/crud/index'),
				},

				{
					path: 'create',
					name: 'myprofile-document-create',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/document/crud/create')
				},

				{
					path: ':document',
					name: 'myprofile-document-show',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/document/crud/show')
				},
				
				{
					path: ':document/edit',
					name: 'myprofile-document-edit',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/document/crud/create')
				}
			]
		},

		// data utama
		{
			path: 'biodata',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/biodata'),
			children: [
				{
					path: '',
					name: 'myprofile-biodata',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/biodata/crud/index'),
				},

				{
					path: 'create',
					name: 'myprofile-biodata-create',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/biodata/crud/create')
				},

				{
					path: ':biodata',
					name: 'myprofile-biodata-show',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/biodata/crud/show')
				},
				
				{
					path: ':biodata/edit',
					name: 'myprofile-biodata-edit',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/biodata/crud/create')
				}
			]
		},

		// golongan
		{
			path: 'section',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/section'),
			children: [
				{
					path: '',
					name: 'myprofile-section',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/section/crud/index'),
				},

				{
					path: 'create',
					name: 'myprofile-section-create',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/section/crud/create')
				},

				{
					path: ':section',
					name: 'myprofile-section-show',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/section/crud/show')
				},
				
				{
					path: ':section/edit',
					name: 'myprofile-section-edit',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/section/crud/create')
				}
			]
		},

		// jabatan
		{
			path: 'position',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/position'),
			children: [
				{
					path: '',
					name: 'myprofile-position',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/position/crud/index'),
				},

				{
					path: 'create',
					name: 'myprofile-position-create',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/position/crud/create')
				},

				{
					path: ':position',
					name: 'myprofile-position-show',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/position/crud/show')
				},
				
				{
					path: ':position/edit',
					name: 'myprofile-position-edit',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/position/crud/create')
				}
			]
		},

		// posisi
		{
			path: 'formation',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/formation'),
			children: [
				{
					path: '',
					name: 'myprofile-formation',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/formation/crud/index'),
				},

				{
					path: 'create',
					name: 'myprofile-formation-create',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/formation/crud/create')
				},

				{
					path: ':formation',
					name: 'myprofile-formation-show',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/formation/crud/show')
				},
				
				{
					path: ':formation/edit',
					name: 'myprofile-formation-edit',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/formation/crud/create')
				}
			]
		},

		// pendidikan
		{
			path: 'education',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/education'),
			children: [
				{
					path: '',
					name: 'myprofile-education',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/education/crud/index'),
				},

				{
					path: 'create',
					name: 'myprofile-education-create',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/education/crud/create')
				},

				{
					path: ':education',
					name: 'myprofile-education-show',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/education/crud/show')
				},
				
				{
					path: ':education/edit',
					name: 'myprofile-education-edit',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/education/crud/create')
				}
			]
		},

		// keluarga
		{
			path: 'family',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/family'),
			children: [
				{
					path: '',
					name: 'myprofile-family',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/family/crud/index'),
				},

				{
					path: 'create',
					name: 'myprofile-family-create',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/family/crud/create')
				},

				{
					path: ':family',
					name: 'myprofile-family-show',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/family/crud/show')
				},
				
				{
					path: ':family/edit',
					name: 'myprofile-family-edit',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/family/crud/create')
				}
			]
		},

		// kompetensi
		{
			path: 'competency',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/competency'),
			children: [
				{
					path: '',
					name: 'myprofile-competency',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/competency/crud/index'),
				},

				{
					path: 'create',
					name: 'myprofile-competency-create',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/competency/crud/create')
				},

				{
					path: ':competency',
					name: 'myprofile-competency-show',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/competency/crud/show')
				},
				
				{
					path: ':competency/edit',
					name: 'myprofile-competency-edit',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/competency/crud/create')
				}
			]
		},

		// performa
		{
			path: 'performance',
			component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/performance'),
			children: [
				{
					path: '',
					name: 'myprofile-performance',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/performance/crud/index'),
				},

				{
					path: 'create',
					name: 'myprofile-performance-create',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/performance/crud/create')
				},

				{
					path: ':performance',
					name: 'myprofile-performance-show',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/performance/crud/show')
				},
				
				{
					path: ':performance/edit',
					name: 'myprofile-performance-edit',
					component: () => import(/* webpackChunkName: "myprofile-module" */ '@modules/myprofile/pages/performance/crud/create')
				}
			]
		},
	]
};

export default route;