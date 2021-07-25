<template>
    <apps-landing
        :product_logo="product_logo"
        :product_name="product_name"
        :product_theme="product_theme"
        :text_color="text_color"
        :welcome_text="welcome_text"
        :workunit_name="workunit_name"
        :workunit_region="workunit_region"
    >
        <v-btn :color="product_theme" rounded dark :to="{ name: 'account-login' }">login to apps</v-btn>

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
    </apps-landing>
</template>

<script>
export default {
    name: 'mono-apps-landing',

    components: {
        'apps-landing': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "desktop-components" */ '@components/web/appsLanding');
            }

            return import(/* webpackChunkName: "mobile-components" */ '@components/mobile/appsLanding');
        }
    },

    computed: {
        snackbar: function() {
            return this.$store.state.snackbar;
        }
    },

    data:() => ({
        device_name: null,
        product_logo: null,
        product_name: null, 
        product_theme: null, 
        text_color: null, 
        welcome_text: null, 
        workunit_name: null, 
        workunit_region: null,

        loading: false,
        email: null
    }),

    created() {
        let {
            device_name, product_logo, product_name, product_theme, 
            text_color, welcome_text, workunit_name, workunit_region
        } = this.$store.state.auth.getItem('appsInfo');

        this.device_name = device_name;
        this.product_logo = product_logo;
        this.product_name = product_name;
        this.product_theme = product_theme;
        this.text_color = text_color;
        this.welcome_text = welcome_text;
        this.workunit_name = workunit_name;
        this.workunit_region = workunit_region;
    },
};
</script>