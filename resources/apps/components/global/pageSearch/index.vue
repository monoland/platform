<template>
    <page-search :value="value"></page-search>
</template>

<script>
export default {
    name: 'mono-page-search',

    components: {
        'page-search': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "desktop-components" */ '@components/web/pageSearch');
            }

            return import(/* webpackChunkName: "mobile-components" */ '@components/mobile/pageSearch');
        }
    },

    props: {
        value: {
            type: Boolean,
            default: false
        }
    }
}
</script>