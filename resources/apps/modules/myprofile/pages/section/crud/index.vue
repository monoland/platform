<template>
    <mono-page-form
        color="transparent"
        elevation="0"
        desktop-width="800"
        mobile-width="100vw"
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Golongan Awal</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">golongan</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nama pangkat</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tmt golongan</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tahun mkg</td>
                            <td class="text-right">{{ record.icon }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">bulan mkg</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>

        <v-sheet class="overflow-hidden mt-6" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Golongan Akhir</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">golongan</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nama pangkat</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tmt golongan</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tahun mkg</td>
                            <td class="text-right">{{ record.icon }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">bulan mkg</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>
    </mono-page-form>
</template>

<script>
import { mapState } from 'vuex';

export default {
    computed: {
        ...mapState({
            record: state => state.module.record,
            theme: state => state.theme,
        })
    },
}
</script>