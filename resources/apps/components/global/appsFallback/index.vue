<template>
    <v-app v-cloak>
        <v-app-bar color="transparent" dark flat app>
            <v-btn icon to="/">
                <v-icon>arrow_back</v-icon>
            </v-btn>
        </v-app-bar>

        <v-main :class="product_theme">
            <v-container fill-height>
                <v-row>
                    <v-col class="d-flex flex-column justify-center" cols="12">
                        <div :class="text_color" class="text-center">
                            <div class="text-h2 text-uppercase">
                                <div class="font-fredoka-one">404</div>
                            </div>
                            <div class="text-h6 font-weight-light">Halaman tidak ditemukan.</div>
                        </div>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>

        <v-footer color="transparent" padless app>
            <v-col class="text-center pa-1" cols="12">
                <div class="copyright">copyright &copy; {{ new Date().getFullYear() }} {{ workunit_name }}</div>
            </v-col>
        </v-footer>
    </v-app>
</template>

<script>
export default {
    name: 'mono-apps-fallback',

    data:() => ({
        device_name: null,
        product_logo: null,
        product_name: null, 
        product_theme: null, 
        text_color: null, 
        welcome_text: null, 
        workunit_name: null, 
        workunit_region: null,
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