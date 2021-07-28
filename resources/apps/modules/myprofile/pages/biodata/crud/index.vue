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
                            <td class="text-right">{{ record.nip }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nama</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">jenis kelamin</td>
                            <td class="text-right">{{ record.gender }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">gelar depan</td>
                            <td class="text-right">{{ record.front }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">gelar belakang</td>
                            <td class="text-right">{{ record.back }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tempat lahir</td>
                            <td class="text-right">{{ record.born_place }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tanggal lahir</td>
                            <td class="text-right">{{ record.born_date }}</td>
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
                            <td class="text-right">{{ record.address }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">rt/rw</td>
                            <td class="text-right">{{ record.rtrw }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">desa/kelurahan</td>
                            <td class="text-right">{{ record.village }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">kecamatan</td>
                            <td class="text-right">{{ record.district }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">kota/kabupaten</td>
                            <td class="text-right">{{ record.regency }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">provinsi</td>
                            <td class="text-right">{{ record.province }}</td>
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
                            <td class="text-right">{{ record.faith }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">email</td>
                            <td class="text-right">{{ record.email }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nomor hp</td>
                            <td class="text-right">{{ record.phone }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">npwp</td>
                            <td class="text-right">{{ record.tax }}</td>
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
            // record: state => state.module.record,
            theme: state => state.theme,
        })
    },

    data:() => ({
        record: {
            nip: '197303172001121002',
            name: 'Hendar',
            gender: 'Laki-laki',
            front: '',
            back: 'S.Sos., M.M.',
            born_place: 'Serang',
            born_date: '1973-03-17',
            faith: 'Islam',
            email: 'hendar@bantenprov.go.id',
            phone: '08170051881',
            tax: '',
            address: 'Taman Graha Asri Blok C2 No 1',
            rtrw: 'Rt.003 Rw.019',
            village: 'Serang',
            district: 'Serang',
            regency: 'Kota Serang',
            province: 'Banten',
        }
    })
}
</script>