<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Module</div>
            
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">name</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">slug</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">path</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">icon</td>
                            <td class="text-right">{{ record.icon }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">visibility</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>

        <v-sheet class="mt-6 overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Module Ability</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Name</th>
                            <th class="text-right">Role</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(ability, abilityIndex) in record.abilities" :key="abilityIndex">
                            <td class="overline grey--text text--darken-1">{{ ability.name }}</td>
                            <td class="text-right">{{ ability.role }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>

        <v-sheet class="mt-6 overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Module Pages</div>
            
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Name</th>
                            <th class="text-right">Path</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(page, pageIndex) in record.pages" :key="pageIndex">
                            <td class="overline grey--text text--darken-1">{{ page.name }}</td>
                            <td class="text-right">{{ page.path }}</td>
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