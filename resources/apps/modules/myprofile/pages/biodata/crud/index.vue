<template>
    <mono-page-form
        color="transparent"
        elevation="0"
        desktop-width="800"
        mobile-width="100vw"
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Data utama</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">nip</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nama</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">jenis kelamin</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">gelar depan</td>
                            <td class="text-right">{{ record.icon }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">gelar belakang</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tempat lahir</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tanggal lahir</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>

        <v-sheet class="overflow-hidden mt-6" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Alamat</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">alamat</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">rt/rw</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">desa/kelurahan</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">kecamatan</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">kota/kabupaten</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">provinsi</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>

        <v-sheet class="overflow-hidden mt-6" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Lainnya</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">agama</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">email</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nomor hp</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">npwp</td>
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