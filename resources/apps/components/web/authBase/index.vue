<template>
    <v-app v-cloak>
        <v-app-bar color="transparent" dark flat app>
            <v-btn icon to="/">
                <v-icon>arrow_back</v-icon>
            </v-btn>

            <v-progress-linear
                :active="loading"
                :indeterminate="loading"
                :color="`${product_theme} accent-4`"
                absolute
                top
            ></v-progress-linear>
        </v-app-bar>

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
                    </v-col>

                    <v-col class="d-flex align-center justify-end" cols="6">
                        <v-card width="360" rounded="lg">
                            <v-responsive class="visible" :aspect-ratio="16/9">
                                <div 
                                    class="d-flex flex-grow-1 align-center justify-center" 
                                    :class="product_theme + ' lighten-4'"
                                    style="height: 100%;"
                                >
                                    <div class="d-block" style="height: auto; width: 128px;">
                                        <v-img
                                            :src="product_logo"
                                            max-height="175"
                                            max-width="160"
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
                                </div>
                            </v-responsive>

                            <slot></slot>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>

        <v-footer class="transparent" padless app>
            <v-col class="text-center pa-1" cols="12">
                <div class="copyright">copyright &copy; {{ new Date().getFullYear() }} {{ workunit_name }}</div>
            </v-col>
        </v-footer>

        <slot name="snackbar"></slot>
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
}
</script>