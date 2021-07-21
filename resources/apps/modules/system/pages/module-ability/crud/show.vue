<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <div class="px-4 pt-5">
            
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
            this.$router.push({ name: link.slug })
        }
    }
}
</script>