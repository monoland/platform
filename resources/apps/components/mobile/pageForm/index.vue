<template>
    <v-sheet :color="`${theme} lighten-4`" height="calc(100vh - 112px)"  width="100%">
        <div class="d-flex flex-column align-center justify-center height-100 width-100" v-if="blank">
            <v-avatar :color="`${theme} lighten-3`" size="62">
                <v-icon x-large dark>{{ page.icon }}</v-icon>
            </v-avatar>

            <div class="text-h5 font-weight-light mt-3" :class="`${theme}--text text--lighten-2`">Halaman {{ page.title }}</div>
        </div>

        <template v-else>
            <v-sheet
                class="clip-corner"
                color="grey lighten-3"
                height="calc(100vh - 112px)" 
                width="100%"
            >
                <div v-show="showShadow" 
                    v-scroll:#form-mobile-content="onFormMobileContentScroll"  
                    class="absolute v-sheet--shadow-content z-index-1" 
                    style="top: -4px;"
                ></div>

                <v-responsive
                    id="form-mobile-content"
                    class="overflow-y-auto"
                    height="calc(100vh - 112px)"
                >
                    <v-sheet 
                        :width="mobileWidth"
                        :max-width="mobileWidth"
                        class="d-flex mx-auto flex-column" 
                        min-height="calc(100vh - 112px)"
                        flat tile
                    >
                        <slot></slot>
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

        color: {
            type: String,
            default: 'white'
        },

        elevation: {
            type: Number | String,
            default: 2
        },

        mobileWidth: {
            type: String,
            default: '100vw'
        }
    },

    data:() => ({
        showShadow: false
    }),

    computed: {
        ...mapState({
            page: state => state.module.page,
            route: state => state.route,
            theme: state => state.theme
        })
    },

    methods: {
        onFormMobileContentScroll: function(e) {
            this.showShadow = e.target.scrollTop > 15;
        },

        hasPermission: function(permission) {
            return this.$store.state.module.page.features.indexOf(permission) !== -1;
        },

        // postCreate: function() {
        //     this.$store.dispatch('create_record').then(({ commit }) => {
        //         commit('PAGE_ACTION', { name: 'index' });
        //     });
        // },

        // postUpdate: function() {
        //     this.$store.dispatch('update_record').then(({ commit }) => {
        //         commit('PAGE_ACTION', { name: 'index' });
        //     });
        // },
    }
}
</script>