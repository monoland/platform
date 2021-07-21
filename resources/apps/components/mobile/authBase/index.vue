<template>
    <v-app v-cloak>
        <v-app-bar color="transparent" dark flat app>
            <v-btn icon to="/">
                <v-icon>arrow_back</v-icon>
            </v-btn>
        </v-app-bar>

        <v-main :class="product_theme" style="overflow: hidden;">
            <v-card 
                class="dynamic-100vh" 
                color="transparent" 
                elevation="0" 
                tile
            >
                <v-responsive class="visible" :aspect-ratio="16/9">
                    <div 
                        class="d-flex flex-grow-1 align-center justify-center" 
                        :class="product_theme"
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

                <div :class="text_color" class="text-center pb-5">
                    <div class="text-h2 text-uppercase">
                        <div class="font-fredoka-one">{{ product_name }}</div>
                    </div>
                    <div class="text-h6 font-weight-light">{{ workunit_name }}</div>
                    <div class="text-h6 font-weight-light">{{ workunit_region }}</div>
                </div>

                <div class="absolute absolute--bottom white width-100">
                    <div class="d-flex flex-column height-100">
                        <div class="relative">
                            <div class="relative z-index-1 line-height-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#03a9f4" fill-opacity="1" d="M0,224L48,192C96,160,192,96,288,106.7C384,117,480,203,576,202.7C672,203,768,117,864,90.7C960,64,1056,96,1152,106.7C1248,117,1344,107,1392,101.3L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
                            </div>
                            <div class="absolute z-index-0 width-100 line-height-0" style="top: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#E1F5FE" fill-opacity="1" d="M0,32L48,80C96,128,192,224,288,234.7C384,245,480,171,576,170.7C672,171,768,245,864,240C960,235,1056,149,1152,138.7C1248,128,1344,192,1392,224L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
                            </div>
                        </div>

                        <div class="flex-grow-1">
                            <slot></slot>
                        </div>

                        <div class="text-center pa-1">
                            <div class="copyright">copyright &copy; {{ new Date().getFullYear() }} {{ workunit_name }}</div>
                        </div>
                    </div>
                </div>
            </v-card>
        </v-main>

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
    },
}
</script>