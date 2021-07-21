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
                                <th class="text-right">Module</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(ability, abilityIndex) in record.abilities" :key="abilityIndex">
                                <td class="grey--text">{{ ability.name }}</td>
                                <td class="text-right">{{ ability.module }}</td>
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
            console.log(link);
        }
    }
}
</script>