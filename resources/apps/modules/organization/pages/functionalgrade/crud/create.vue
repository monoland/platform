<template>
    <mono-page-form>
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Tambah Tingkat Fungsional</div>

            <v-card-text>
                <v-row no-gutters>
                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Nama"
                            v-model="record.name"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Alias"
                            v-model="record.alias"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-select
                            :items="positiontypes"
                            autocomplete="off"
                            label="Tingkat Jabatan"
                            v-model="record.positiontype_id"
                        ></v-select>
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
            record: state => state.module.record,
            positiontypes: state => state.module.page.combos.positiontypes ?? [],
        })
    }
}
</script>