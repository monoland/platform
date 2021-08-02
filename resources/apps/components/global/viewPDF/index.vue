<template>
    <pdf-viewer
        :fileUrl.sync="fileUrl"
    >
        <slot></slot>
    </pdf-viewer>
</template>

<script>
export default {
    name: 'mono-pdf-viewer',

    components: {
        'pdf-viewer': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "desktop-components" */ '@components/web/viewPDF');
            }

            return import(/* webpackChunkName: "mobile-components" */ '@components/mobile/viewPDF');
        }
    },

    props: {
        fileUrl: {
            type: String,
            default: null
        }
    },

    data:() => ({
        filePath: null
    }),

    watch: {
        fileUrl: {
            handler: function(url) {
                this.filePath = url;
            },

            immediate: true
        }
    }
}
</script>