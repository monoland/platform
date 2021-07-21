<template>
    <page-table>
        <template v-slot:mobile_record="{ record, index }">
            <slot name="mobile_record" :record="record" :index="index"></slot>
        </template>
    </page-table>
</template>

<script>
export default {
    name: 'mono-page-table',

    components: {
        'page-table': () => {
            if (window.breakpoint === 'desktop') {
                return import(/* webpackChunkName: "monolandComponents" */ '@components/web/pageTable');
            }

            return import(/* webpackChunkName: "monolandComponents" */ '@components/mobile/pageTable');
        }
    },
}
</script>