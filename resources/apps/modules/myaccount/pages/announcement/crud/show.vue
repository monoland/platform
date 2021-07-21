<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <div class="pa-5">
            <div class="text-h5">{{ record.title }}</div>

            <div class="caption pt-6">{{ record.updated_at }}</div>
            <div class="pt-2" v-html="record.article"></div>
        </div>
    </mono-page-form>
</template>

<script>
export default {
    computed: {
        record: function() {
            return this.$store.state.module.record;
        }
    },

    methods: {
        bindClickLink: function(link) {
            console.log(link);
        }
    }
}
</script>