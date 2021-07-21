<template>
    <page-filter
        :height="height"
        :top="top"
        :width="width"
    ></page-filter>
</template>

<script>
export default {
    name: 'mono-page-filter',
    
    components: {
        'page-filter': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "monolandComponents" */ '@components/web/pageFilter');
            }

            return import(/* webpackChunkName: "monolandComponents" */ '@components/mobile/pageFilter');
        }
    },

    props: {
        height: {
            type: String,
            default: 'calc(100vh - 180px)'
        },

        top: {
            type: String,
            default: '0'
        },
        
        width: {
            type: String,
            default: '100%'
        },


    }
}
</script>