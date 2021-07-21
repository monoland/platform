<template>
    <v-app v-cloak>
        <!-- toolbar -->
        <v-app-bar :color="`${theme} darken-1`" class="v-toolbar--wrapper" app clipped-right flat>
            <v-app-bar :color="theme" flat dark>
                <v-icon class="mr-3">{{ module.icon }}</v-icon>

                <v-spacer></v-spacer>
                
                <v-toolbar-title class="text-uppercase">
                    <span class="font-fredoka-one spacing-1">{{ module.name }}</span>
                    <span class="font-weight-light">{{ page.title }}</span>
                </v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn icon @click="dialogLogout = true" v-if="route.base === 'myaccount-dashboard'">
                    <v-icon>power_settings_new</v-icon>
                </v-btn>

                <template v-else>
                    <v-btn icon v-if="hasPermission('search')" @click="page.search.status = true">
                        <v-icon>search</v-icon>
                    </v-btn>
                </template>
            </v-app-bar>

            <mono-page-search></mono-page-search>
        </v-app-bar>

        <slot></slot>

        <!-- navigation -->
        <v-bottom-navigation
            color="primary"
            app
        >
            <v-btn v-for="(page, index) in module.sides" 
                :key="`appsmenu-${index}`"
                :to="{ name: page.slug }"
            >
                <span>{{ page.name }}</span>
                <v-icon>{{ page.icon }}</v-icon>
            </v-btn>
        </v-bottom-navigation>

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
    computed: {
        ...mapState({
            module: state => state.module,
            page: state => state.module.page,
            features: state => state.module.page.features,
            route: state => state.route,
            theme: state => state.theme,
        }),
    },

    data:() => ({
        dialogLogout: false
    }),

    methods: {
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

        hasPermission: function(permission) {
            return this.features.indexOf(permission) > -1;
        }
    }
};
</script>