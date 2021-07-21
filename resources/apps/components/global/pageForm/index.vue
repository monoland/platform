<template>
    <page-form 
        :blank="blank"
        :color="color"
        :elevation="elevation"
    >
        <slot></slot>
    </page-form>
</template>

<script>
export default {
    name: 'mono-page-form',

    components: {
        'page-form': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "monolandComponents" */ '@components/web/pageForm');
            }

            return import(/* webpackChunkName: "monolandComponents" */ '@components/mobile/pageForm');
        }
    },

    props: {
        blank: {
            type: Boolean,
            default: false
        },

        clickLink: {
            type: Function,
            default:() => {}
        },

        color: {
            type: String,
            default: 'white'
        },

        elevation: {
            type: Number | String,
            default: 2
        },

        refetchData: {
            type: Boolean,
            default: false
        },
    },

    watch: {
        '$store.state.module.page.initialized': {
            handler: function(status) {
                if (! status) { 
                    return; 
                }

                this.$store.commit('FORM_INITIALIZE', {
                    bindClickLink: this.clickLink,
                    route: this.$route,

                    completed:({ path }) => {
                        if (path === 'show' && this.refetchData) {
                            this.$store.dispatch('show_record').then(({ response }) => {
                                this.$emit('initialized', response);
                            });
                        }
                    }
                });
            },

            immediate: true
        }
    }
}
</script>