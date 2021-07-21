<template>
    <v-sheet :color="`${theme} lighten-4`" height="calc(100vh - 112px)"  width="100%">
        <div class="d-flex flex-column align-center justify-center height-100 width-100" v-if="blank">
            <v-avatar :color="`${theme} lighten-3`" size="62">
                <v-icon x-large dark>{{ page.icon }}</v-icon>
            </v-avatar>

            <div class="text-h5 font-weight-light mt-3" :class="`${theme}--text text--lighten-2`">Halaman {{ page.title }}</div>
        </div>

        <template v-else>
            <v-toolbar 
                :color="`${theme} lighten-4`"  
                :flat="!page.filter.status"
                class="z-index-1"
            >
                <v-btn icon disabled></v-btn>
                
                <!-- <v-btn icon disabled v-if="page.layoutSingle"></v-btn>
                
                <v-btn v-else
                    icon 
                    @click="$store.commit('PAGE_ACTION', { name: 'index' })"
                >
                    <v-icon>arrow_back</v-icon>
                </v-btn> -->

                <v-spacer></v-spacer>
                
                <v-toolbar-title class="text-uppercase text-subtitle-1">
                    <span class="overline">{{ page.title }}-{{ route.path }}</span>
                </v-toolbar-title>
                
                <v-spacer></v-spacer>

                <v-btn icon v-if="route.path === 'create'" @click="postCreate">
                    <v-icon>outbox</v-icon>
                </v-btn>

                <v-btn icon v-else-if="route.path === 'edit'" @click="postUpdate">
                    <v-icon>outbox</v-icon>
                </v-btn>

                <v-btn icon disabled v-else></v-btn>
            </v-toolbar>

            <v-sheet
                class="clip-corner"
                :color="`${theme} lighten-5`"
                height="calc(100vh - 168px)" 
                width="100%"
            >
                <div v-show="shadow" 
                    v-scroll:#form-content="onFormContentScroll"  
                    class="absolute v-sheet--shadow-content z-index-1" 
                    :style="`top: 47px;`"
                ></div>

                <v-responsive
                    id="form-content"
                    class="overflow-y-auto"
                    height="calc(100vh - 168px)"
                >
                    <v-sheet 
                        :color="color"
                        class="d-flex mx-auto flex-column" 
                        :elevation="elevation"
                        :max-width="maxWidth"
                        min-height="calc(100vh - 168px)"
                        flat tile
                    >
                        <div class="d-flex flex-column relative flex-grow-1">
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

        color: {
            type: String,
            default: 'white'
        },

        elevation: {
            type: Number | String,
            default: 2
        },

        maxWidth: {
            type: String,
            default: '560'
        }
    },

    data:() => ({
        shadow: false
    }),

    computed: {
        ...mapState({
            page: state => state.module.page,
            route: state => state.route,
            theme: state => state.theme
        })
    },

    methods: {
        onFormContentScroll: function(e) {
            this.shadow = e.target.scrollTop > 15;
        },

        hasPermission: function(permission) {
            return this.$store.state.module.page.features.indexOf(permission) !== -1;
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
        },
    }
}
</script>