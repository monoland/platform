<template>
    <page-base
        :layoutDouble="layoutDouble"
        :layoutSingle="layoutSingle"
    >
        <slot></slot>

        <template v-slot:form>
            <v-fade-transition mode="out-in">
                <router-view :key="$route.path"></router-view>
            </v-fade-transition>
        </template>
    </page-base>
</template>

<script>
export default {
    name: 'mono-page-base',  

    components: {
        'page-base': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "desktop-components" */ '@components/web/pageBase');
            }

            return import(/* webpackChunkName: "mobile-components" */ '@components/mobile/pageBase');
        }
    },

    props: {
        layoutDouble: {
            type: Boolean,
            default: false
        },

        layoutSingle: {
            type: Boolean,
            default: false
        },
        
        name: {
            type: String,
            default: null
        },

        title: {
            type: String,
            default: null
        },
    },

    computed: {
        theme: function() {
            return this.$store.state.theme;
        }
    },

    created() {
        this.$store.commit('PAGE_INITIALIZE', {
            name: this.name,
            layoutDouble: this.layoutDouble,
            layoutSingle: this.layoutSingle,
            route: this.$route,
            
            completed:() => {
                this.$store.dispatch('fetch_records', {
                    reset: true,
                    completed: ({ commit, state, response }) => {
                        this.$emit('initialized', { commit, state, response });
                    }
                });
            }
        });
    }
};
</script>