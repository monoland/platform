<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Page Information</div>
        
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">Name</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">Slug</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">Icon</td>
                            <td class="text-right">{{ record.icon }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">Prefix</td>
                            <td class="text-right">{{ record.prefix }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">Path</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">Side</td>
                            <td class="text-right">{{ record.side }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">Dock</td>
                            <td class="text-right">{{ record.dock }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>
        
        <v-sheet class="my-md-6 overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Page Permissions</div>
            
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Name</th>
                            <th class="text-right">Slug</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(permission, permissionIndex) in record.permissions" :key="permissionIndex">
                            <td class="overline grey--text text--darken-1">{{ permission.name }}</td>
                            <td class="text-right">{{ permission.slug }}</td>
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