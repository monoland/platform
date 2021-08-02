<template>
    <file-upload
        :label="label"
        :hint="hint"
        :value="fileUrl"
        @input="updateModel"
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
        },

        value: {
            type: String,
            default: null
        }
    },

    data:() => ({
        fileUrl: null
    }),

    methods: {
        updateModel: function(value) {
            this.$emit('input', value);
        }
    },

    watch: {
        value: function(value) {
            this.fileUrl = value;
        }
    }
}
</script>