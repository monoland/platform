<template>
    <v-sheet color="transparent" height="calc(100vh - 88px)"  width="100%">
        <div class="d-flex flex-column align-center justify-center height-100 width-100" v-if="blank">
            <v-avatar :color="`${theme} lighten-3`" size="62">
                <v-icon x-large dark>{{ page.icon }}</v-icon>
            </v-avatar>

            <div class="text-h5 font-weight-light mt-3" :class="`${theme}--text text--lighten-2`">Halaman {{ page.title }}</div>
        </div>

        <template v-else>
            <v-sheet
                class="relative clip-corner overflow-hidden"
                color="grey lighten-3"
                height="calc(100vh - 88px)"
                width="100%"
            >
                <div v-show="showShadow" 
                    v-scroll:#form-web-content="onFormWebContentScroll"  
                    class="absolute v-sheet--shadow-content z-index-1" 
                    style="top: -4px;"
                ></div>

                <v-responsive
                    id="form-web-content"
                    class="relative overflow-y-auto z-index-0"
                    height="calc(100vh - 88px)"
                >
                    <v-sheet 
                        :width="desktopWidth"
                        :max-width="desktopWidth"
                        class="d-flex mx-auto flex-column transparent"
                        min-height="calc(100vh - 152px)"
                        flat tile
                    >
                        <div class="relative my-6">
                            <slot></slot>
                        </div>
                    </v-sheet>
                </v-responsive>
            </v-sheet>
        </template>
    </v-sheet>
</template>

<script>
import { mapState } from 'vuex';

export default {
    props: {
        blank: {
            type: Boolean,
            default: false
        },

        desktopWidth: {
            type: String,
            default: '560'
        }
    },

    computed: {
        ...mapState({
            page: state => state.module.page,
            route: state => state.route,
            theme: state => state.theme
        })
    },

    data:() => ({
        showShadow: false,
    }),

    methods: {
        hasPermission: function(permission) {
            return this.$store.state.module.page.features.indexOf(permission) !== -1;
        },

        onFormWebContentScroll: function(e) {
            this.showShadow = e.target.scrollTop > 15;
        }
    }
}
</script>