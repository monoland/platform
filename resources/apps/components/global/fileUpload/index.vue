<template>
    <file-upload
        :label="label"
        :hint="hint"
    ></file-upload>
</template>

<script>
export default {
    name: 'mono-file-upload',

    components: {
        'file-upload': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "desktop-components" */ '@components/web/fileUpload');
            }

            return import(/* webpackChunkName: "mobile-components" */ '@components/mobile/fileUpload');
        }
    },

    props: {
        label: {
            type: String,
            default: ''
        },

        hint: {
            type: String,
            default: ''
        }
    }
}
</script>