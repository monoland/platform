<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Permission information</div>
        
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text">Name</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text">Slug</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text">Page</td>
                            <td class="text-right">{{ record.page }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text">Module</td>
                            <td class="text-right">{{ record.module }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>
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