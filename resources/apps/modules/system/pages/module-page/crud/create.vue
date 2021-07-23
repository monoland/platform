<template>
    <mono-page-form>
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Create new page</div>

            <v-card-text>
                <v-row no-gutters>
                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Name"
                            v-model="record.name"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Icon"
                            v-model="record.icon"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Prefix"
                            v-model="record.prefix"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Path"
                            v-model="record.path"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-select
                            :items="parents"
                            autocomplete="off"
                            label="Parent"
                            v-model="record.parent_id"
                        ></v-select>
                    </v-col>

                    <v-col cols="12">
                        <v-textarea
                            autocomplete="off"
                            label="Describe"
                            v-model="record.describe"
                        ></v-textarea>
                    </v-col>

                    <v-col class="mt-3" cols="12">
                        <span class="overline">appearance</span>
                    </v-col>

                    <v-col cols="12">
                        <v-switch
                            autocomplete="off"
                            label="Show on side menu"
                            v-model="record.side"
                            hide-details
                            inset
                        ></v-switch>
                    </v-col>

                    <v-col cols="12">
                        <v-switch
                            autocomplete="off"
                            label="Show on dock menu"
                            v-model="record.dock"
                            inset
                        ></v-switch>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-sheet>
    </mono-page-form>
</template>

<script>
import { mapState } from 'vuex';

export default {
    computed: {
        ...mapState({
            parents: state => state.module.page.combos.parents ?? [],
            record: state => state.module.record,
        })
    },

    mounted() {
        this.$store.dispatch('custom_request', {
            prefix: '/combo',
            method: 'get',
            completed:({ state, response }) => {
                state.module.page.combos = response.combos;
            }
        });
    }
}
</script>