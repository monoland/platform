<template>
    <page-data>
        <slot></slot>
    </page-data>
</template>

<script>
export default {
    name: 'mono-page-data',

    components: {
        'page-data': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "monolandComponents" */ '@components/web/pageData');
            }

            return import(/* webpackChunkName: "monolandComponents" */ '@components/mobile/pageData');
        }
    },
}
</script>