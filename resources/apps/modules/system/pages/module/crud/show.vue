<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <div class="px-4 pt-5">
            <v-row class="pb-1 pt-3 mt-1" no-gutters>
                <v-col class="grey--text" cols="3">Name</v-col>
                <v-col class="text-end" cols="9">{{ record.name }}</v-col>
            </v-row>

            <v-divider></v-divider>

            <v-row class="pb-1 pt-3 mt-1" no-gutters>
                <v-col class="grey--text" cols="3">Slug</v-col>
                <v-col class="text-end" cols="9">{{ record.slug }}</v-col>
            </v-row>

            <v-divider></v-divider>

            <v-row class="pb-1 pt-3 mt-1" no-gutters>
                <v-col class="grey--text" cols="3">Path</v-col>
                <v-col class="text-end" cols="9">{{ record.path }}</v-col>
            </v-row>

            <v-divider></v-divider>

            <v-row class="pb-1 pt-3 mt-1" no-gutters>
                <v-col class="grey--text" cols="3">Icon</v-col>
                <v-col class="text-end" cols="9">{{ record.icon }}</v-col>
            </v-row>

            <v-divider></v-divider>

            <v-row class="pb-1 pt-3 mt-1" no-gutters>
                <v-col class="grey--text" cols="3">Visibility</v-col>
                <v-col class="text-end" cols="9">{{ record.visibility }}</v-col>
            </v-row>

            <v-divider></v-divider>

            <v-row class="pb-1 pt-8 mt-1" no-gutters>
                <v-col cols="12"><div class="overline">abilities</div></v-col>
            </v-row>
        </div>

        <v-row no-gutters>
            <v-col cols="12">
                <v-simple-table dense>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="grey--text">Name</th>
                                <th class="text-right">Role</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(ability, abilityIndex) in record.abilities" :key="abilityIndex">
                                <td class="grey--text">{{ ability.name }}</td>
                                <td class="text-right">{{ ability.role }}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>

        <div class="px-4">
            <v-row class="pb-1 pt-8 mt-1" no-gutters>
                <v-col cols="12"><div class="overline">pages</div></v-col>
            </v-row>
        </div>

        <v-row no-gutters>
            <v-col cols="12">
                <v-simple-table dense>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="grey--text">Name</th>
                                <th class="text-right">Path</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(page, pageIndex) in record.pages" :key="pageIndex">
                                <td class="grey--text">{{ page.name }}</td>
                                <td class="text-right">{{ page.path }}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>
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