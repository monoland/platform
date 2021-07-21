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
                return import(/* webpackChunkName: "monolandComponents" */ '@components/web/pageHome');
            }

            return import(/* webpackChunkName: "monolandComponents" */ '@components/mobile/pageHome');
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

            callback:() => {
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