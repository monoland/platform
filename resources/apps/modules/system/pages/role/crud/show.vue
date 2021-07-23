<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Role</div>
            
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">name</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>

        <v-sheet class="mt-6 overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Role has abilities</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Name</th>
                            <th class="text-right">Module</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(ability, abilityIndex) in record.abilities" :key="abilityIndex">
                            <td class="grey--text text--darken-1 overline">{{ ability.name }}</td>
                            <td class="text-right">{{ ability.module }}</td>
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