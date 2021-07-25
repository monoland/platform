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
                return import(/* webpackChunkName: "desktop-components" */ '@components/web/pageData');
            }

            return import(/* webpackChunkName: "mobile-components" */ '@components/mobile/pageData');
        }
    },
}
</script>