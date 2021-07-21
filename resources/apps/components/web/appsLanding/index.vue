<template>
    <v-app v-cloak>
        <v-main :class="product_theme">
            <v-container fill-height>
                <v-row>
                    <v-col class="d-flex flex-column justify-center" cols="6">
                        <div :class="text_color">
                            <div class="text-h2 text-uppercase">
                                <div class="font-fredoka-one">{{ product_name }}</div>
                            </div>
                            <div class="text-h6 font-weight-light">{{ workunit_name }}</div>
                            <div class="text-h6 font-weight-light">{{ workunit_region }}</div>
                            <div class="text-subtitle-1 mt-5 font-weight-light" v-html="welcome_text"></div>
                        </div>

                        <div class="mt-4">
                            <v-btn color="deep-orange" dark depressed rounded :to="{ name: 'account-login' }">login to apps</v-btn>
                        </div>
                    </v-col>
                    
                    <v-col class="d-flex align-center justify-end" cols="6">
                        <div class="d-block" style="height: auto; width: 240px;">
                            <v-img
                                :src="product_logo"
                                max-width="240"
                            >
                                <template v-slot:placeholder>
                                    <v-row
                                        class="fill-height ma-0"
                                        align="center"
                                        justify="center"
                                    >
                                        <v-icon>downloading</v-icon>
                                    </v-row>
                                </template>
                            </v-img>
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
    props: {
        loading: {
            type: Boolean,
            default: false
        },

        product_logo: {
            type: String,
            default: ''
        },

        product_name: {
            type: String,
            default: ''
        },

        product_theme: {
            type: String,
            default: ''
        },

        text_color: {
            type: String,
            default: ''
        },
        
        welcome_text: {
            type: String,
            default: ''
        },
        
        workunit_name: {
            type: String,
            default: ''
        },
        
        workunit_region: {
            type: String,
            default: ''
        },
    }
};
</script>