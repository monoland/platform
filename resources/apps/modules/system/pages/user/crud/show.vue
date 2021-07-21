<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <div class="pa-5">
            
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