import Vue from 'vue'
import Apps from './Apps.vue'

if (! ('breakpoint' in window)) {
    let isMobileDevice = [
        /Android/i,
        /AndroidOS/i,
        /webOS/i,
        /iPhone/i,
        /iPad/i,
        /iPod/i,
        /BlackBerry/i,
        /Windows Phone/i
    ].some((device) => {
        return navigator.userAgent.match(device);
    });

    let breakpoint = Auth.getItem('breakpoint');

    window.breakpoint = breakpoint ? breakpoint : isMobileDevice ? 'mobile' : 'desktop';
    // window.breakpoint = breakpoint ? breakpoint : (navigator.userAgentData.mobile ? 'mobile' : 'desktop');
}

import Auth from '@plugins/auth';
import router from '@plugins/router';
import vuetify from '@plugins/vuetify';
import store from '@plugins/store';

if (Auth.hasKey('profile')) {
    store.state.theme = Auth.profile.theme;
}

Vue.config.productionTip = false;

import Echo from 'laravel-echo';

if (! store.state.echo && process.env.MIX_PUSHER_ENABLE === 'true') {
    window.Pusher = require('pusher-js');

    store.state.echo = new Echo({
        broadcaster: 'pusher',
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        forceTLS: false,
        authorizer: (channel, options) => {
            return {
                authorize: (socketId, callback) => {
                    store.state.confirmation.http.post('/broadcasting/auth', {
                        socket_id: socketId,
                        channel_name: channel.name
                    })
                    .then(response => {
                        callback(false, response.data);
                    })
                    .catch(error => {
                        callback(true, error);
                    });
                }
            }
        }
    });
}

// register global component
const components = require.context('@components/global', true, /index.vue$/);

components.keys().forEach((component) => {
    const buffObject = components(component).default;

    Vue.component(
        buffObject.name, 
        buffObject
    );
});

new Vue({
    router,
    store,
    vuetify,
    render: h => h(Apps)
}).$mount('#monoland');