import Auth from '@plugins/auth';

const basePage = {
    combos: {},
    features: [],
    finds: [],
    filter: {
        filterBy: null,
        filterOn: null,
        filterOp: null,
        status: false
    },
    filters: [],
    icon: null,
    initialized: false,
    key: null,
    layoutDefault: false,
    layoutDouble: false,
    layoutSingle: false,
    links: [],
    mode: 'default',
    parent: true,
    parent_path: null,
    prefix: null,
    path: null,
    permissions: [],
    route: null,
    record_base: {},
    search: {
        findBy: null,
        findOn: null,
        status: false
    },
    slug: null,
    selected: [],
    selected_index: -1,
    show_on_click: false,
    title: 'untitled'
};

const baseTable = {
    current_page: 0,
    last_page: 0,
    total: 0,

    filter: {
        filter_on: null,
        filter_by: null,
        filter_op: null,
    },

    options: {
        page: 1,
        itemsPerPage: process.env.MIX_PAGE_ITEMPERPAGE,
        sortBy: [],
        sortDesc: []
    },

    params: {
        filter_on: null,
        filter_by: null,
        filter_op: null,
        find_on: null,
        find_by: null,
        initialized: true,
        items_per_page: process.env.MIX_PAGE_ITEMPERPAGE,
        page: 1,
        sort_by: null,
        sort_desc: null,
        trashed: null,
    },

    params_cache: {},

    single: true,

    search: {
        find_on: 'name',
        find_by: null
    },
};

const baseModule = {
    base: false,
    dataType: null,
    name: null,
    docks: [],
    sides: [],
    icon: null,
    page: JSON.parse(JSON.stringify(basePage)),
    pages: [],
    record: {},
    records: [],
    slug: null,
    table: JSON.parse(JSON.stringify(baseTable)),
};

const state = {
    auth: Auth,

    baseURL: null,

    bindClickLink: null,

    echo: null,
    
    http: null,

    loading: false,

    module: JSON.parse(JSON.stringify(baseModule)),

    modules: [],

    confirmation: {
        http: null,
        initialized: false,
        state: false,
        cache: {},
    },

    requestParams: {
        initialized: true,
        
        filterOn: null,
        filterBy: null,
        FilterOp: null,
            
        findOn: null,
        findBy: null,
        
        itemsPerPage: process.env.MIX_PAGE_ITEMPERPAGE,
        page: 1,
        sortBy: null,
        sortDesc: null,
        
        mode: 'default',
    },

    route: {
        name: null,
        base: null,
        param: null,
        params: {},
        path: 'index',
        query: {},
    },

    router: null,

    snackbar: {
        color: null,
        state: false,
        text: null,
        offline: false
    },

    theme: process.env.MIX_PAGE_THEME,

    upload: {
        mime: 'application/pdf',
        max: 1024
    }
}

export default state;
export { basePage, baseTable, baseModule };