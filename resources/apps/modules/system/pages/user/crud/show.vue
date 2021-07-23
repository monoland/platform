<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">User information</div>
            
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">name</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">email</td>
                            <td class="text-right">{{ record.email }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>

        <v-sheet class="mt-6 overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">User abilities</div>
            
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Module</th>
                            <th class="text-right">Ability</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(license, licenseIndex) in record.licenses" :key="licenseIndex">
                            <td class="overline grey--text text--darken-1">{{ license.module }}</td>
                            <td class="text-right">
                                {{ license.ability }} 
                                <router-link class="transparent--text" :to="{ 
                                    name: 'system-ability-show', 
                                    params: { module: license.module_id, ability: license.ability_id } 
                                }">
                                    <v-icon class="ml-2" color="blue">source</v-icon>
                                </router-link>
                            </td>
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
            console.log(link);
        }
    }
}
</script>