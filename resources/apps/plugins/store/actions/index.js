let buildRequestURI = function({ module, route }) {
    let _path = module.page.path;
    let _expl = _path.split('/').length;

    if (typeof route.params === 'object' && Object.keys(route.params).length > 0) {
        for (let keys = Object.keys(route.params), i = 0, end = keys.length; i < end; i++) {
            let key = keys[i];
            let value = route.params[key];

            if (_expl && _expl > 3 && _path.includes(`${key}/:${key}/`)) {
                _path = _path.replace(`${key}/:${key}/`, ``);
                _expl = _path.split('/').length;

                continue;
            }

            if (_path.includes(`${key}/:${key}/`)) {
                _path = _path.replace(`${key}/:${key}/`, `${key}/${value}/`);
            }
        }
    }

    return `${module.page.prefix}/api/${_path}`;
}

const actions = {
    /**
     * 
     * @param {*} param0 
     * @param {*} param1 
     */
    mono_request: async function(
        { commit, dispatch, state },
        { method, url, responseType, params, validation, completed }
    ){
        try {
            commit('APPS_LOADING', true);

            /**
             * `method` is the request method to be used when making the request
             */
            if (! method) {
                method = 'get';
            }

            if (method === 'delete') {
                params = { data: params };
            }
            
            /**
             * `url` is the server URL that will be used for the request
             */
            if (! url) {
                url = state.module.data_url;
            }

            /**
             * `responseType` indicates the type of data that the server will respond with
             * options are: 'arraybuffer', 'document', 'json', 'text', 'stream', 'blob'
             */
            if (! responseType) {
                responseType = 'json';
            }

            // state.cache = { method, url, responseType, params, validation, completed };
            
            /**
             * `canceled` indicates validation is not valid
             */
            let canceled = false;

            if (typeof validation === 'function') {
                canceled = validation({ state });
            }

            if (canceled && 'message' in canceled) {
                commit('APPS_SNACKBAR', {
                    color: 'warning',
                    text: canceled.message,
                    state: true,
                });
                
                return Promise.reject(canceled.message);
            }

            /**
             * check given params is function
             */
            if (params && typeof params === 'function') {
                params = params({state});
            }

            let { data: response } = await state.http[method](url, params);

            if (typeof completed === 'function') {
                completed({ commit, dispatch, state, response});
            }

            return { commit, dispatch, state, response };
        } catch ({ response, message }) {
            return dispatch('error_handler', { 
                response, 
                message, 
                request: { 
                    method, 
                    url, 
                    responseType, 
                    params, 
                    validation, 
                    completed
                } 
            });
        } finally {
            commit('APPS_LOADING', false);
        }
    },

    custom_request: function({ commit, dispatch, state }, { prefix, method, params, completed })
    {
        if (! params) {
            params = {};
        }
        
        return dispatch('mono_request', {
            url: buildRequestURI(state) + prefix,
            
            method: method,

            params,

            completed:({ response }) => {
                if (completed && typeof completed === 'function') {
                    completed({ commit, state, response });
                }
            }
        });
    },

    fetch_records: function({ commit, dispatch, state }, {reset, completed})
    {
        return dispatch('mono_request', {
            url: buildRequestURI(state),
            
            method: 'get',

            params:() => {
                return state.module.page.layoutSingle ? null : { params: state.requestParams };
            },

            completed:({ response }) => {
                commit('RECORD_INITIALIZE', {reset, response});
                
                if (completed && typeof completed === 'function') {
                    completed({ commit, state, response });
                }
            }
        });
    },

    show_record: function({ commit, dispatch, state })
    {
        return dispatch('mono_request', { 
            url: `${buildRequestURI(state)}/${parseInt(state.route.params[state.route.param])}`,

            method: 'get',

            params:() => {
                return { params: { 
                    mode: state.module.page.mode,
                    action: state.route.path
                }}
            },
            
            completed:({ response }) => {
                let { features, links, record } = response;

                commit('RECORD_UPDATE', { features, links, record });
            }
        });
    },

    create_record: function({ commit, dispatch, state })
    {
        return dispatch('mono_request', { 
            url: buildRequestURI(state),

            method: 'post',
            
            params: state.module.record,

            completed:({ response }) => {
                commit('RECORD_ADDNEW', response);
                
                commit('APPS_SNACKBAR', {
                    color: 'info',
                    text: 'create record success.',
                    state: true,
                });
            }
        });
    },

    delete_record: function({ commit, dispatch, state })
    {
        return dispatch('mono_request', { 
            url: `${buildRequestURI(state)}/${parseInt(state.route.params[state.route.param])}`,

            method: 'delete',

            params: state.module.record,
            
            completed:({ response }) => {
                commit('RECORD_DELETE');

                commit('APPS_SNACKBAR', {
                    color: 'info',
                    text: 'delete record success.',
                    state: true,
                });
            }
        });
    },

    destroy_record: function({ commit, dispatch, state })
    {
        return dispatch('mono_request', { 
            url: `${buildRequestURI(state)}/${parseInt(state.route.params[state.route.param])}/destroy`,

            method: 'delete',

            completed:({ response }) => {
                commit('RECORD_DELETE');

                commit('APPS_SNACKBAR', {
                    color: 'info',
                    text: 'destroy record success.',
                    state: true,
                });
            }
        });
    },

    restore_record: function({ commit, dispatch, state })
    {
        return dispatch('mono_request', { 
            url: `${buildRequestURI(state)}/${parseInt(state.route.params[state.route.param])}/restore`,

            method: 'post',

            completed:({ response }) => {
                commit('RECORD_DELETE');

                commit('APPS_SNACKBAR', {
                    color: 'info',
                    text: 'restore record success.',
                    state: true,
                });
            }
        });
    },

    update_record: function({ commit, dispatch, state })
    {
        return dispatch('mono_request', { 
            url: `${buildRequestURI(state)}/${parseInt(state.route.params[state.route.param])}`,

            method: 'put',

            params: state.module.record,
            
            completed:({ response }) => {
                if (Object.keys(response).length === 0) {
                    return;
                }

                commit('RECORD_UPDATE', { record: response });

                commit('APPS_SNACKBAR', {
                    color: 'info',
                    text: 'update record success.',
                    state: true,
                });
            }
        });
    },

    build_url: function({ state })
    {
        let _path = state.module.page.path;

        if (typeof state.router.params === 'object' && 
            Object.keys(state.router.params).length > 0
        ) {
            for (let keys = Object.keys(state.router.params), i = 0, end = keys.length; i < end; i++) {
                let key = keys[i];
                let value = state.router.params[key];

                if ((i + 1 ) < end) {
                    if (_path.includes(`${key}/:${key}/`)) {
                        _path = _path.replace(`${key}/:${key}/`, '');
                    }
                } else {
                    if (_path.includes(`:${key}`)) {
                        _path = _path.replace(`:${key}`, value)
                    }
                }
            }
        }

        return _path;
    },

    walkout: function({ state })
    {
        state.auth.clear();
        state.router.push({ name: 'default-landing' });
    },

    error_handler: function({ state, commit, dispatch }, { response, message, request })
    {
        let status = null;
        let errors = {};

        if ( response ) {
            let { data: { message: err_message, errors: err_bags }, status: err_status } = response;

            message = err_message;
            status = err_status;
            errors = err_bags;
        }

        // error yang tidak terdeteksi
        if (!message && !status) {
            commit('APPS_SNACKBAR', {
                color: 'error',
                text: 'Terjadi kesalahan proses pada server.',
                state: true,
            });

            return Promise.reject('Terjadi kesalahan proses pada server.');
        }

        // koneksi di tolak
        if (message.includes('Connection refused')) {
            commit('APPS_SNACKBAR', {
                color: 'error',
                text: 'Koneksi ke server terputus, silahkan coba beberapa saat lagi.',
                state: true,
                offline: true,
            });

            return Promise.reject('Koneksi ke server terputus, silahkan coba beberapa saat lagi.');
        }

        if (status) {
            switch(status) {
                case 404:
                    message = 'alamat url tidak ditemukan di server';
                    break;

                case 401:
                case 419:
                    message = 'Anda tidak memiliki otorisasi untuk akses laman ini.';
                    dispatch('walkout');
                    
                    break;
                
                case 403:
                    message = 'Anda tidak memiliki izin untuk akses laman ini.';
                    break;
                
                case 423:
                    message = null;
                    commit('CONFIRMATION_INITIALIZE', request);
                    
                    break;

                case 429:
                    message = 'Terlalu banyak mencoba.';

                    break;
                
                default:
                    if (errors && Object.keys(errors).length > 0) {
                        let messages = [];
            
                        Object.keys(errors).forEach((key) => {
                            messages = messages.concat(errors[key]);
                        });
            
                        commit('APPS_SNACKBAR', {
                            color: 'error',
                            text: messages,
                            state: true,
                        });
            
                        return Promise.reject(messages);
                    }
            }

            if (message) {
                commit('APPS_SNACKBAR', {
                    color: 'error',
                    text: message,
                    state: true,
                });

                return Promise.reject(message);
            } else {
                return Promise.reject('Konfirmasi password di perlukan untuk akses fungsi ini.');
            }
        }

        if (errors && Object.keys(errors).length > 0) {
            let messages = [];

            Object.keys(errors).forEach((key) => {
                messages = messages.concat(errors[key]);
            });

            commit('APPS_SNACKBAR', {
                color: 'error',
                text: messages,
                state: true,
            });

            return Promise.reject(messages);
        }

        if (!status && message) {
            commit('APPS_SNACKBAR', {
                color: 'error',
                text: message,
                state: true,
            });

            return Promise.reject(message);
        }
    },

};

export default actions;