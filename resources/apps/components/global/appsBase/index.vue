<template>
    <apps-base 
        :logo="logo"
        :profile="profile"   
    >
        <v-main :class="`${theme} height-100vh overflow-y-hidden`" :theme="theme">
            <v-fade-transition mode="out-in">
                <router-view :key="name"></router-view>
            </v-fade-transition>
        </v-main>

        <v-dialog
            v-model="$store.state.confirmation.state"
            width="360"
            persistent
        >
            <v-card class="clip-corner" flat>
                <v-toolbar :color="`${theme} lighten-4`" dense flat>
                    <v-toolbar-title class="overline">password confirmation</v-toolbar-title>
                </v-toolbar>

                <v-card-text>
                    <v-text-field
                        class="mt-6"
                        v-model="password"
                        :type="visible ? 'text' : 'password'"
                        label="Confirm your password to continue"
                        outlined
                        hide-details
                        
                    ></v-text-field>

                    <span class="d-block caption grey--text text--darken-1 pt-1">
                        <v-checkbox 
                            class="mt-0" 
                            label="Tampilkan sandi" 
                            v-model="visible"
                            hide-details
                        ></v-checkbox>
                    </span>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn plain color="grey darken-4" @click="cancelPasswordConfirmation">cancel</v-btn>
                    <v-btn class="ml-3" :color="theme" depressed dark @click="submitPasswordConfirmation">confirm</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        
        <template v-slot:snackbar>
            <v-snackbar v-model="snackbar.state" :color="snackbar.color" :timeout="3500">
                <template v-if="typeof snackbar.text === 'string'">
                    {{ snackbar.text }}
                </template>

                <div v-else-if="snackbar.text && snackbar.text.constructor === Array"
                    class="d-flex flex-column"
                >
                    <span v-for="(message, index) in snackbar.text" :key="index"
                        class="b-block"
                    >{{ message }}</span>
                </div>
                
                <template v-slot:action="{ attrs }">
                    <v-btn dark text v-bind="attrs" @click.stop.prevent="$store.commit('SNACKBAR_CLOSE')">Close</v-btn>
                </template>
            </v-snackbar>
        </template>
    </apps-base>
</template>

<script>
import { mapState } from 'vuex';

export default {
    name: 'mono-apps-base',

    components: {
        'apps-base': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "desktop-components" */ '@components/web/appsBase');
            }

            return import(/* webpackChunkName: "mobile-components" */ '@components/mobile/appsBase');
        }
    },
    
    props: {
        baseModule: {
            type: Boolean,
            default: false
        },

        name: {
            type: String,
            required: true
        },

        standalone: {
            type: Boolean,
            default: false
        }
    },

    computed: {
        ...mapState({
            appsInfo: state => state.auth.getItem('appsInfo') ?? {},
            cache: state => state.confirmation.cache,
            echo: state => state.echo,
            profile: state => state.auth.getItem('profile') ?? {},
            snackbar: state => state.snackbar,
            theme: state => state.theme,
        }),

        logo: function() {
            if ('product_logo' in this.appsInfo) {
                return this.appsInfo.product_logo;
            }

            return '';
        }
    },

    data:() => ({
        password: null,
        visible: false
    }),

    created() {
        this.$store.commit('MODULE_INITIALIZE', {
            name: this.name,
            baseModule: this.baseModule,
        });
    },

    methods: {
        cancelPasswordConfirmation: function() {
            this.$store.commit('CONFIRMATION_CANCEL');
        },

        listenBroadcastChannel: function() {
            this.echo.private(`user-${this.$store.state.auth.identifier}-activity`)
                .listen('UserSuccessfullLogin', ({ login: { agent } }) => {
                    this.$store.commit('APPS_SNACKBAR', {
                        color: 'warning',
                        text: `Anda login pada ${agent.platform} dengan browser ${agent.browser}.`,
                        state: true
                    });
                });
        },

        submitPasswordConfirmation: function() {
            this.$store.state.confirmation.http.post('confirm-password', {
                password: this.password
            }).then(({ status }) => {
                if (status === 200 || status === 201) {
                    this.$store.dispatch('mono_request', {
                        url: this.cache.url,
                        method: this.cache.method,
                        params: this.cache.params,
                        validation: this.cache.validation,
                        completed: this.cache.completed,
                    }).then(({ state }) => {
                        state.confirmation.cache = {};
                        state.confirmation.state = false;
                    });
                }
            });
        }
    },

    watch: {
        '$store.state.confirmation.initialized': {
            handler: function() {
                if (process.env.MIX_PUSHER_ENABLE !== 'true') {
                    return;
                }

                setTimeout(() => {
                    this.listenBroadcastChannel();
                }, 500);
            }
        }
    }
}
</script>