<template>
    <page-home
        :title="title"
    >
        <slot></slot>
    </page-home>
</template>

<script>
export default {
    name: 'mono-page-home',  

    components: {
        'page-home': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "desktop-components" */ '@components/web/pageHome');
            }

            return import(/* webpackChunkName: "mobile-components" */ '@components/mobile/pageHome');
        }
    },

    props: {
        name: {
            type: String,
            default: null
        },

        title: {
            type: String,
            default: null
        }
    },

    created() {
        this.$store.commit('PAGE_INITIALIZE', {
            name: this.name,
            layoutDouble: false, 
            layoutSingle: true, 
            validatePermission: false,

            completed:() => {
                this.$store.dispatch('fetch_records', {
                    reset: true,
                    completed: ({ commit, state, response }) => {
                        this.$emit('initialized', { commit, state, response });
                    }
                });
            }
        });
    },
};
</script>