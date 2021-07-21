<template>
    <router-view v-if="isFontLoaded"></router-view>

    <v-app v-else>
        <v-main class="light-blue">
            <v-container fill-height fluid>
                <v-row align-content="center" justify="center">
                    <span class="copyright light-blue--text text--darken-4">monoland</span>
                    <div id="preloader">
                        <div id="loader"></div>
                    </div>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
import WebFontLoader from 'webfontloader';

export default {
    data:() => ({
        isFontLoaded: false,
    }),

    created() {
        this.$store.commit('APPS_INITIALIZE', { 
            router: this.$router
        });
    },

    beforeDestroy () {
      if (typeof window === 'undefined') return;

      window.removeEventListener('resize', this.onResize, { passive: true });
    },

    mounted() {
        this.onResize();

        WebFontLoader.load({
            custom: {
                families: ['Fredoka One', 'Roboto:100,300,400,500,700', 'Material Icons Outlined'],
                urls: ['/fonts/webfonts.min.css']
            },
            
            active:() => {
                if (! this.$store.state.auth.hasKey('appsInfo')) {
                    this.fetchAppsInfo();
                } else {
                    this.isFontLoaded = true;
                }
            },

            timeout: 5000
        });

        window.addEventListener('resize', this.onResize, { passive: true })
    },

    methods: {
        onResize: function() {
            setTimeout(() => {
                window.breakpoint = this.$vuetify.breakpoint.mobile ? 'mobile' : 'desktop';

                this.$store.state.auth.setItem('breakpoint', window.breakpoint);
            }, 200);
        },

        fetchAppsInfo: async function() {
            try {
                let { data: appsInfo } = await this.$store.state.http.get('/apps-info');
                
                // store apps info to localStorage
                this.$store.state.auth.setItem('appsInfo', appsInfo);

                // show the page
                this.isFontLoaded = true;
                
            } catch (error) {
                this.isFontLoaded = false;
            }
        }
    }
};
</script>