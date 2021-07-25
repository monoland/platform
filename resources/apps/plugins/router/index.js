import Vue from 'vue';
import VueRouter from 'vue-router';
import Auth from '@plugins/auth';

Vue.use(VueRouter);

let routes = [];

/**
 * add landing page to routes
 */
routes.push({ 
    path: '/', 
    name: 'default-landing', 
    component: () => import(/* webpackChunkName: "basic-components" */ '@pages/landing') 
});

/**
 * scan and register routes
 */
const routemaps = require.context('@modules', true, /router\/index\.js$/);

routemaps.keys().forEach((path) => {
    let maps = routemaps(path).default;
    
    if (!Array.isArray(maps)) {
        routes.push(maps);
    } else {
        maps.forEach(route => {
            routes.push(route);
        });
    }
});

/**
 * add fallback page to routes
 */
routes.push({ 
    path: '*',
    name: 'default-fallback',  
    component: () => import(/* webpackChunkName: "basic-components" */ '@pages/fallback') 
});

/**
 * create new VueRouter
 */
let DEV_MODE = process.env.NODE_ENV === 'development';

let ROUTER_MODE = DEV_MODE ? process.env.MIX_DEV_ROUTERMODE : process.env.MIX_PRD_ROUTERMODE;

const router = new VueRouter({
	mode: ROUTER_MODE,
	routes,
});

/**
 * apply route filter
 */
router.beforeEach((to, _from, next) => {
    if (to.matched.some((r) => r.meta.requiredAuth)) {
        if (!Auth.authorized) {
            next({ name: process.env.MIX_PAGE_LOGIN });
        } else {
             next();
        }
    } else {
        if ((to.name === 'default-landing' || to.name === process.env.MIX_PAGE_LOGIN) && Auth.authorized) {
            next({ name: process.env.MIX_PAGE_DASHBOARD });
        } else {
            next();
        }
    }
});

router.afterEach((to, from) => {
    if (to.matched.some((r) => r.meta.requiredAuth) && 
        Auth.authorized &&
        ('name' in to && to.name && to.name.includes('dashboard')) && 
        ('name' in from && from.name && from.name.includes(process.env.MIX_PAGE_DASHBOARD)) 
    ) {
        Auth.validated = false;
        
        Auth.modules.forEach(module => {
            if (module.pages.find(p => p.slug === to.name)) {
                Auth.validated = true;
            }
        });
    } else {
        Auth.validated = false;
    }
});

export default router;