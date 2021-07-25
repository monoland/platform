<template>
    <v-app v-cloak>
        <v-system-bar app :color="`${theme} darken-1`"></v-system-bar>

        <!-- toolbar -->
        <v-app-bar :color="`${theme} darken-1`" class="v-toolbar--wrapper" app clipped-right flat>
            <v-app-bar class="clip-corner" :color="theme" flat dark>
                <template v-if="['create', 'edit', 'show'].indexOf(route.path) > -1">
                    <v-btn icon @click="$store.commit('PAGE_ACTION', { name: 'index' })">
                        <v-icon>arrow_back</v-icon>
                    </v-btn>
                </template>

                <template v-else>
                    <v-icon v-if="page.parent && (route.name && route.name.includes('dashboard'))"
                        class="mr-3"
                    >{{ module.icon }}</v-icon>

                    <v-btn v-else-if="page.parent && ! (route.name && route.name.includes('dashboard'))"
                        icon
                        @click="backToDashboard"
                    >
                        <v-icon>arrow_back</v-icon>
                    </v-btn>
                    
                    <v-btn icon v-else @click="backToParent">
                        <v-icon>arrow_back</v-icon>
                    </v-btn>
                </template>

                <v-spacer></v-spacer>
                
                <v-toolbar-title class="text-uppercase pl-0">
                    <span class="font-fredoka-one spacing-1">{{ module.name }}</span>
                    <!-- <span class="font-weight-light">{{ page.title }}</span> -->
                    <span class="font-weight-light">{{ page.title && page.title.toLowerCase() === 'beranda' ? '' : page.title }}</span>
                </v-toolbar-title>

                <v-spacer></v-spacer>
                
                <template v-if="route.base && route.base.includes('dashboard')">
                    <v-btn icon @click="dialogLogout = true" v-if="module.base">
                        <v-icon>power_settings_new</v-icon>
                    </v-btn>

                    <v-btn icon @click="attemptExitToApp" v-if="!module.base">
                        <v-icon>exit_to_app</v-icon>
                    </v-btn>
                </template>

                <template v-else>
                    <v-btn v-if="route.path === 'index' && hasPermission('search')" 
                        icon
                        @click="page.search.status = true"
                    >
                        <v-icon>search</v-icon>
                    </v-btn>

                    <template v-else>
                        <template v-if="['create', 'edit'].indexOf(route.path) > -1">
                            <v-btn icon v-if="route.path === 'create'" @click="postCreate">
                                <v-icon>outbox</v-icon>
                            </v-btn>

                            <v-btn icon v-else-if="route.path === 'edit'" @click="postUpdate">
                                <v-icon>outbox</v-icon>
                            </v-btn>
                        </template>

                        <v-btn icon disabled v-else></v-btn>
                    </template>
                </template>
            </v-app-bar>

            <mono-page-search></mono-page-search>
        </v-app-bar>

        <!-- navigation -->
        <v-navigation-drawer app 
            disable-resize-watcher
            touchless
        >
            <template v-slot:prepend>
                <div class="d-block width-100" :class="`${theme} darken-1`">
                    <v-sheet
                        class="clip-corner"
                        :color="`${theme} lighten-5`"
                        height="128"
                        width="100%"
                    >
                        <div class="pa-4 height-100">
                            <v-avatar :color="theme">
                                <img :src="logo" alt="logo" v-if="!profile.avatar">
                            </v-avatar>

                            <div class="text-subtitle-1 font-weight-medium line-height-1 mt-3">
                                {{ profile.name }}
                            </div>

                            <div class="caption">{{ profile.email }}</div>
                        </div>
                    </v-sheet>
                </div>
            </template>

            <v-list nav>
                <v-list-item-group :color="`${theme} darken-1`">
                    <v-list-item v-for="(page, index) in module.sides" :key="`appsmenu-${index}`"
                        :to="{ name: page.slug }"
                    >
                        <v-list-item-icon>
                            <v-icon>{{ page.icon }}</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>{{ page.name }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>

        <slot></slot>

        <slot name="snackbar"></slot>

        <!-- dialog -->
        <v-dialog
            v-model="dialogLogout"
            persistent
            max-width="290"
        >
            <v-card>
                <v-card-title>Signout <span class="text-uppercase pl-2">{{ module.name }}</span></v-card-title>
                
                <v-card-text>
                    Are you sure want to logout? This will clear all your data on this device.
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                        :color="`${theme} lighten-2`"
                        text
                        @click="dialogLogout = false"
                    >
                        Batal
                    </v-btn>

                    <v-btn
                        :color="`${theme} darken-1`"
                        text
                        @click="attemptSignout"
                    >
                        Keluar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
import { mapState } from 'vuex';

export default {
    props: {
        logo: {
            type: String,
            default: null
        },

        profile: {
            type: Object,
            default:() => ({})
        },
    },

    computed: {
        ...mapState({
            module: state => state.module,
            page: state => state.module.page,
            features: state => state.module.page.features,
            route: state => state.route ?? {},
            theme: state => state.theme,
        }),
    },

    data:() => ({
        dialogLogout: false
    }),

    methods: {
        attemptExitToApp: function() {
            this.$router.push({ name: process.env.MIX_PAGE_DASHBOARD });
        },

        attemptSignout: async function() {
            this.dialogLogout = false;

            try {
                await this.$store.state.http.post('account/logout');
                
                this.$store.state.auth.clear();
                this.$router.push({ name: 'default-landing' });
            } catch (error) {
                console.log(error);
            }
        },

        backToDashboard: function() {
            this.$router.push({ name: this.module.slug + '-dashboard' });
        },

        backToParent: function() {
            if (! this.page.parent_path) {
                return;
            }

            this.$router.push({ name: this.page.parent_path + '-show', params: this.route.params});
        },

        hasPermission: function(permission) {
            return this.features.indexOf(permission) > -1;
        },

        postCreate: function() {
            this.$store.dispatch('create_record').then(({ commit }) => {
                commit('PAGE_ACTION', { name: 'index' });
            });
        },

        postUpdate: function() {
            this.$store.dispatch('update_record').then(({ commit }) => {
                commit('PAGE_ACTION', { name: 'index' });
            });
        }
    }
};
</script>