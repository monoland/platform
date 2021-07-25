<template>
    <mono-page-form
        color="transparent"
        elevation="0"
        desktop-width="800"
        mobile-width="100vw"
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Riwayat CPNS/PNS</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">status kepegawaian</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nomor sk cpns</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tanggal sk cpns</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tmt cpns</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nama jabatan yang mengangkat cpns</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nomor sk pns</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tanggal sk pns</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tmt pns</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="caption text-capitalize font-weight-medium grey--text text--darken-1">nomor surat tanda tamat pendidikan dan latihan (STTPL)</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="caption text-capitalize font-weight-medium grey--text text--darken-1">tanggal surat tanda tamat pendidikan dan latihan (STTPL)</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="caption text-capitalize font-weight-medium grey--text text--darken-1">nomor surat pernyataan melaksanakan tugas (SPMT)</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="caption text-capitalize font-weight-medium grey--text text--darken-1">tanggal surat pernyataan melaksanakan tugas (SPMT)</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nomor pertek c2th</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tanggal pertek c2th</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nomor surat dokter</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tanggal surat dokter</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nomor karpeg</td>
                            <td class="text-right">{{ record.path }}</td>
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