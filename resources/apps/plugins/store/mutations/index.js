import axios from 'axios';
import { baseTable } from '@plugins/store/state';

const mutations = {
    /**
     * application init
     * @param {*} state 
     * @param {*} payload 
     */
    APPS_INITIALIZE: function(state, payload)
    {
        // check localStorage has modules
        if (state.auth.hasKey('modules') && state.auth.modules.length > 0) {
            state.modules = JSON.parse(JSON.stringify(state.auth.modules));
        }

        // check payload has router
        if ('router' in payload) {
            state.router = payload.router;
        }

        let DEV_MODE = process.env.NODE_ENV === 'development';

        let BASE_URL = DEV_MODE ? 
            `${process.env.MIX_DEV_PROTOCOL}://${process.env.MIX_DEV_DOMAIN}` : 
            `${process.env.MIX_PRD_PROTOCOL}://${process.env.MIX_PRD_DOMAIN}`;

        state.baseURL = BASE_URL;

        state.http = axios.create({
            baseURL: BASE_URL,
            withCredentials: true 
        });

        if (state.auth.hasKey('mode')) {
            state.requestParams.mode = state.auth.mode;
        }
    },

    APPS_LOADING: function(state, payload)
    {
        state.loading = payload;
    },

    APPS_SNACKBAR: function(state, payload)
    {
        Object.keys(payload).forEach((key) => {
			if (key in state.snackbar) {
				state.snackbar[key] = payload[key];
			} else {
				state.snackbar = { ...state.snackbar, [key]: payload[key] };
			}
		});
    },

    AUTH_INITIALIZE: function(state, payload)
    {
        state.modules = payload.modules;
        state.theme = payload.profile.theme;

        state.auth.setItem('profile', payload.profile);
        state.auth.setItem('modules', payload.modules);
    },

    BUILD_REQUEST_PARAMS: function(state, { mode, search, filters })
    {
        if (mode) {
            state.requestParams.mode = mode;
            state.auth.setItem('mode', mode);
        }

        state.requestParams.findBy = search;

        if (search) {
            state.requestParams.findOn = state.module.page.search.findOn.split(',');
        } else {
            state.requestParams.findOn = null;
        }

        if (filters) {
            let _filterBy = [];
            let _filterOn = [];
            let _filterOp = [];

            filters.filter(v => v.used === true).forEach(filter => {
                _filterBy.push(filter.value.filterBy);
                _filterOn.push(filter.value.filterOn);
                _filterOp.push(filter.value.filterOp);
            });

            if (_filterBy.length) {
                state.requestParams.filterBy = _filterBy;
                state.requestParams.filterOn = _filterOn;
                state.requestParams.filterOp = _filterOp;
            } else {
                state.requestParams.filterBy = null;
                state.requestParams.filterOn = null;
                state.requestParams.filterOp = null;
            }
        }
    },

    CONFIRMATION_INITIALIZE: function(state, request)
    {
        state.confirmation.cache = request;

        state.confirmation.state = true;
    },

    CONFIRMATION_CANCEL: function(state)
    {
        state.confirmation.cache = {};
        state.confirmation.state = false;
    },

    DATA_INITIALIZE: function(state, { route, completed })
    {
        // route => initialize
        state.route.base = state.module.page.slug;
        state.route.query = route.query;
        
        // route => fetch param
        let _arrayBase = state.route.base.split('-');
        state.route.param = _arrayBase[_arrayBase.length - 1];
        
        // route => fetch path and name
        state.route.path = 'index';
        state.route.name = state.route.base;
        state.route.params = {};

        // search
        state.module.page.search.status = state.module.page.search.findBy && state.module.page.search.findBy.trim().length > 0;
        
        // filter => close
        state.module.page.filter.status = false;
    },

    FORM_INITIALIZE: function(state, { bindClickLink, route, completed })
    {
        // bind click link
        state.bindClickLink = bindClickLink;

        // route => initialize
        state.route.base = state.module.page.slug;
        state.route.query = route.query;
        
        // route => fetch param
        let _arrayBase = state.route.base.split('-');
        state.route.param = _arrayBase[_arrayBase.length - 1];
        
        // route => fetch path and name
        state.route.path = route.name.replace(state.module.page.slug, '').substring(1);
        state.route.name = state.route.base + '-' + state.route.path;

        // path => null
        if (! state.route.path.length) {
            state.route.path = 'index';
            state.route.name = state.route.base;
        }

        // check is single-layout
        if (state.module.page.layoutSingle) {
            return;
        }

        if (['index', 'create'].indexOf(state.route.path) > -1) {
            state.route.params = route.params;
            state.module.page.selected = [];
            state.module.page.selected_index = -1;
            state.module.record = JSON.parse(JSON.stringify(state.module.page.record_base));
            
        } else {
            state.route.params = route.params;

            let _currentRecord = JSON.parse(
                JSON.stringify(state.module.records.find(rc => rc.id === parseInt(state.route.params[state.route.param])))
            );

            if (! _currentRecord) {
                return;
            }

            let _currentIndex = state.module.dataType === 'list' ? 
                parseInt(state.route.params[state.route.param]) : 
                state.module.records.findIndex(rc => rc.id === parseInt(state.route.params[state.route.param]));

            state.module.page.selected = [_currentRecord];
            state.module.page.selected_index = _currentIndex;
            state.module.record = _currentRecord;

            if (typeof completed === 'function') {
                completed({ path: state.route.path });
            }
        }
    },

    CRUD_INITIALIZE: function(state, { bindClickLink, route, completed })
    {
        // bind click link
        state.bindClickLink = bindClickLink;

        // route => initialize
        state.route.base = state.module.page.slug;
        state.route.query = route.query;
        
        // route => fetch param
        let _arrayBase = state.route.base.split('-');
        state.route.param = _arrayBase[_arrayBase.length - 1];
        
        // route => fetch path and name
        state.route.path = route.name.replace(state.module.page.slug, '').substring(1);
        state.route.name = state.route.base + '-' + state.route.path;

        if (! state.route.path.length) {
            state.route.path = 'index';
            state.route.name = state.route.base;
        }

        // search
        if (state.route.path === 'index') {
            state.module.page.search.status = state.module.page.search.findBy && state.module.page.search.findBy.trim().length > 0;
        } else {
            state.module.page.search.status = false;
        }

        if (['index', 'create'].indexOf(state.route.path) > -1) {
            state.route.params = {};
        } else {
            state.route.params = route.params;
        }

        // filter => close
        state.module.page.filter.status = false;

        if (state.module.page.layoutSingle) {
            return;
        }

        // crud => index | create 
        if (['index', 'create'].indexOf(state.route.path) > -1) {
            state.module.page.selected = _currentRecord;
            state.module.page.selected_index = _currentIndex;
            state.module.record = JSON.parse(JSON.stringify(state.module.page.record_base));

            return;
        }
        
        // crud => show | edit | etc
        let _currentIndex, _currentRecord;

        _currentIndex = state.module.records.findIndex(rc => rc.id === parseInt(state.route.params[state.route.param]));

        if (_currentIndex < 0) {
            state.router.push({ name: state.route.base });
            return;
        }

        _currentRecord = JSON.parse(
            JSON.stringify(state.module.records.find(rc => rc.id === parseInt(state.route.params[state.route.param])))
        );

        state.module.page.selected = [_currentRecord];
        state.module.page.selected_index = _currentIndex;
        state.module.record = _currentRecord;

        if (typeof completed === 'function') {
            completed({ path: state.route.path });
        }
    },

    HTTP_INITIALIZE: function(state, payload)
    {
        if (state.auth.hasKey('token')) {
            state.http = axios.create({
                baseURL: state.baseURL + '/' + payload,
                withCredentials: false,
                headers: {
                    Authorization: 'Bearer ' + state.auth.getItem('token')
                }
            });
        } else {
            state.http = axios.create({
                baseURL: state.baseURL + '/' + payload,
                withCredentials: true 
            });
        }
    },

    MODULE_INITIALIZE: function(state, { name, baseModule })
    {
        let module = state.modules.find(m => m.slug === name);

        if (! module) {
            return;
        }

        // init http
        if (state.auth.hasKey('token')) {
            state.http = axios.create({
                baseURL: state.baseURL,
                withCredentials: false,
                headers: {
                    Authorization: 'Bearer ' + state.auth.getItem('token')
                }
            });

            state.uploader = axios.create({
                baseURL: state.baseURL,
                withCredentials: false,
                headers: {
                    Authorization: 'Bearer ' + state.auth.getItem('token'),
                    'Content-Type': 'application/octet-stream'
                }
            });
        } else {
            state.http = axios.create({
                baseURL: state.baseURL,
                withCredentials: true 
            });

            state.uploader = axios.create({
                baseURL: state.baseURL,
                withCredentials: true,
                headers: {
                    'Content-Type': 'application/octet-stream'
                }
            });
        }

        if (! state.confirmation.http) {
            if (state.auth.hasKey('token')) {
                state.confirmation.http = axios.create({
                    baseURL: state.baseURL + '/account',
                    withCredentials: false,
                    headers: {
                        Authorization: 'Bearer ' + state.auth.getItem('token')
                    }
                });
            } else {
                state.confirmation.http = axios.create({
                    baseURL: state.baseURL + '/account',
                    withCredentials: true 
                });
            }

            state.confirmation.initialized = true;
        }

        state.module.base = baseModule;
        state.module.name = module.name;
        state.module.pages = module.pages;
        state.module.slug = module.slug;
        
        state.module.docks = [];

        let _docks = module.pages.reduce((result, page) => {
            if (page.dock) {
                result.push({...page, module: false });
            }

            return result;
        }, []);

        let _modules = [];
        
        if (state.module.base) {
            _modules = state.modules.reduce((result, module) => {
                if (module.show) {
                    result.push({ ...module, module: true });
                }
    
                return result;
            }, []);
        }
        
        state.module.docks = _docks.concat(_modules);

        state.module.sides = module.pages.reduce((result, page) => {
            if (page.side) {
                result.push(page);
            }

            return result;
        }, []);

        state.module.icon = module.icon;
        state.module.record = {};
        state.module.records = [];
        state.module.table = JSON.parse(JSON.stringify(baseTable));
        state.theme = baseModule ? state.auth.profile.theme : module.color;
    },

    MODULE_DATATYPE: function(state, payload)
    {
        state.module.dataType = payload;
    },

    PAGE_INITIALIZE: function(state, { 
        name, nested, layoutDouble, layoutSingle, 
        route, completed 
    }) {
        let page = state.module.pages.find(p => p.slug === name);

        if (! page) {
            return;
        }

        state.module.record = JSON.parse(JSON.stringify(state.module.page.record_base));
        state.module.records = [];
        state.module.table = JSON.parse(JSON.stringify(baseTable));
        
        state.module.page.prefix = page.prefix;
        state.module.page.path = page.path;
        state.module.page.nested = nested;

        if (!layoutDouble && !layoutSingle) {
            state.module.page.layoutDefault = true;
            state.module.page.layoutDouble = false;
            state.module.page.layoutSingle = false;
        } else {
            state.module.page.layoutDefault = false;
            state.module.page.layoutDouble = layoutDouble;
            state.module.page.layoutSingle = layoutSingle;
        }

        let _currentRoute = state.router.currentRoute;
        state.route.base = _currentRoute.name;
        state.route.name = _currentRoute.name;
        state.route.path = 'index';
        state.route.params = _currentRoute.params;

        state.module.page.title = page.name;
        state.module.page.features = [];
        state.module.page.permissions = [];
        state.module.page.route = route;
        state.module.page.slug = page.slug;
        state.module.page.initialized = false;
        
        page.permissions.forEach(permission => {
            state.module.page.features.push(
                permission.replace(`-${name}`, '')
            );
        });

        if (typeof completed === 'function') {
            completed();
        }
    },

    PAGE_ACTION: function(state, { name })
    {
        if (name === 'index') {
            state.route.name = state.route.base;

            state.module.parentId = null;
            state.module.page.selected = [];
            state.module.page.selected_index = -1;
        } else {
            state.route.name = state.route.base + '-' + name;
        }

        state.router.push({ name: state.route.name, params: state.route.params });
    },

    PAGE_SET_PARAMS: function(state, { search, filters, mode })
    {
        if (search) {
            state.module.page.search.findBy = search;
        }
    },

    PAGE_SELECTED: function(state, selected)
    {
        if (! selected || (Array.isArray(selected) && selected.length === 0)) {
            if (state.route.path === 'index') {
                state.module.parentId = null;
            }

            state.module.page.selected = [];
            state.module.page.selected_index = -1;

            // goto index page
            if (state.module.page.layoutDouble) {
                state.router.push({ name: state.route.base });
            }
            
            return;
        }
        
        if (state.module.page.selected_index > -1) {
            return;
        }

        let _currentRecord, _currentIndex;

        if (Array.isArray(selected) && selected.length > 0) {
            _currentRecord = JSON.parse(JSON.stringify(selected[0]));
            _currentIndex = state.module.records.findIndex(rc => rc.id === _currentRecord.id);
        } else  {
            _currentRecord = JSON.parse(JSON.stringify(state.module.records.find(rc => rc.id === selected)));
            _currentIndex = selected;
        }

        state.module.page.selected = [_currentRecord];
        state.module.page.selected_index = _currentIndex;

        
        state.route.params[state.route.param] = _currentRecord.id;

        if (state.module.page.nested) {
            state.module.parentId = _currentRecord.id;

            return;
        }

        // goto show page
        state.router.push({ name: state.route.base + '-show', params: state.route.params });
    },

    RECORD_INITIALIZE: function(state, {reset, response})
    {
        if (state.module.page.layoutSingle) {
            state.module.records = [];
            state.module.record = response;
            state.module.page.initialized = true;
            return;
        }

        let { data: records, meta, setups } = response;
        
        if (meta && Object.keys(meta).length) {
			state.module.table.total = meta.total;
			state.module.table.current_page = meta.current_page;
			state.module.table.last_page = meta.last_page;
        }

        if (setups && Object.keys(setups).length > 0) {
            // set page combo
            state.module.page.combos = Array.isArray(setups.combos) ? {} : setups.combos;

            // set page features
            Object.keys(setups.features).forEach(key => {
                let _index = state.module.page.features.indexOf(key);

                if (_index !== -1) {
                    state.module.page.features.splice(_index, 1);
                }

                if (setups.features[key]) {
                    state.module.page.features.push(key)
                }
            });

            // set page filters
            state.module.page.filters = setups.filters;

            // set page finds
            state.module.page.finds = setups.finds;
            state.module.page.search.findOn = setups.finds[0];

            // set page headers
            state.module.page.headers = setups.headers;

            // set page icon
            state.module.page.icon = setups.icon;

            // set page key
            state.module.page.key = setups.key;

            // set page links
            state.module.page.links = setups.links;

            // set page mode
            state.module.page.mode = setups.mode;

            // set page parent
            state.module.page.parent = setups.parent;

            // set page parent path
            state.module.page.parent_path = setups.parent_path;

            // set page recordBase
            state.module.page.record_base = setups.record_base;

            // set page create permission
            if (state.module.page.validateCreatePermission) {
                if (!setups.permissions.includes('create') && state.module.page.permissions.includes('create')) {
                    let create_index = state.module.page.permissions.indexOf('create');

                    if (create_index > -1) {
                        state.module.page.permissions.splice(create_index, 1);
                    }
                }
            }

            // set page title
            state.module.page.title = setups.title;
        }

        if (records && Object.keys(records).length) {
            if (reset && reset === true) {
                state.module.records = [];
            }
            
			let startIndex = state.module.records.length + 1;

			records.forEach((record, index) => {
				if (!('id' in record)) {
					record = { ...record, id: startIndex + index };
				}

				state.module.records.push(record);
			});
        } else {
            state.module.records = [];
        }

        if (!state.module.page.initialized) {
			state.module.page.initialized = true;
			state.module.record = JSON.parse(JSON.stringify(state.module.page.record_base));
        }
    },

    RECORD_ADDNEW: function(state, record)
    {
        state.module.records.push(record);

		state.module.table.total = state.module.records.length;
		state.module.table.last_page = Math.floor(state.module.records.length / state.module.table.options.items_per_page) + 1;
    },

    RECORD_DELETE: function(state)
    {
        state.module.records.splice(state.module.page.selected_index, 1);
    },

    RECORD_UPDATE: function(state, { features, links, record })
    {
        // update features
        if (features) {
            Object.keys(features).forEach(key => {
                if (features[key] && state.module.page.features.indexOf(key) === -1) {
                    state.module.page.features.push(key);
                }
            });
        }
        
        // update links
        if (links) {
            state.module.page.links = [];
            links.forEach(link => {
                state.module.page.links.push( 
                    { 
                        ...link, 
                        execute: (link) => {
                            state.module.page.linkBindClick(link);
                        } 
                    } 
                )
            });

            state.module.page.links = links;
        }

        // update record
        if (record) {
            let _recordIndex = state.module.records.findIndex(rc => rc.id === record.id);

            if (_recordIndex < 0) {
                return;
            }

            state.module.record = record;
            
            Object.keys(record).forEach((key) => {
                state.module.records[_recordIndex][key] = record[key];
            });
        }
    },
    
    SNACKBAR_CLOSE: function(state)
    {
        state.snackbar.state = false;
    }
};

export default mutations;