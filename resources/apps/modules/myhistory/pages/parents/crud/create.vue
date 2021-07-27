<template>
    <mono-page-form
        desktop-width="800"
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-6 pt-4 pb-3 text-h6">Tambah riwayat orangtua</div>

            <v-stepper v-model="step">
                <v-stepper-header>
                    <v-stepper-step
                        step="1"
                    >
                        Masukan data
                        <small class="mt-1" style="max-width: 168px;">Silahkan masukan data dokumen</small>
                    </v-stepper-step>

                    <v-stepper-step
                        step="2"
                    >
                        Upload dokumen
                        <small class="mt-1" style="max-width: 168px;">Silahkan upload dokumen untuk di verifikasi.</small>
                    </v-stepper-step>

                    <v-stepper-step
                        step="3"
                    >
                        Ringkasan
                        <small class="mt-1" style="max-width: 168px;">Silahkan periksa kembali data anda.</small>
                    </v-stepper-step>
                </v-stepper-header>
                
                <v-stepper-items>
                    <v-stepper-content step="1">
                        <v-sheet :color="`grey lighten-4`" class="ma-1" rounded="lg">
                            <v-card-text>
                                <v-row>
                                    <v-col md="12">
                                        <v-text-field
                                            label="Nama"
                                            hide-details
                                        ></v-text-field>
                                    </v-col>

                                    <v-col md="6">
                                        <v-text-field
                                            label="Tempat Lahir"
                                            hide-details
                                        ></v-text-field>
                                    </v-col>

                                    <v-col md="6">
                                        <v-text-field
                                            label="Tanggal Lahir"
                                            hide-details
                                        ></v-text-field>
                                    </v-col>
                                    
                                    <v-col md="6">
                                        <v-select
                                            label="Pilih Jenis Identitas"
                                            hide-details
                                        ></v-select>
                                    </v-col>

                                    <v-col md="6">
                                        <v-text-field
                                            label="Nomor Identitas"
                                            hide-details
                                        ></v-text-field>
                                    </v-col>

                                    <v-col md="12">
                                        <v-text-field
                                            label="Alamat"
                                            hide-details
                                        ></v-text-field>
                                    </v-col>

                                    <v-col md="6">
                                        <v-text-field
                                            label="Nomor HP"
                                            hide-details
                                        ></v-text-field>
                                    </v-col>

                                    <v-col md="6">
                                        <v-text-field
                                            label="Nomor Telpon"
                                            hide-details
                                        ></v-text-field>
                                    </v-col>

                                    <v-col md="12">
                                        <v-text-field
                                            label="Email"
                                            hide-details
                                        ></v-text-field>
                                    </v-col>

                                    <v-col md="6">
                                        <v-select
                                            label="Pilih Agama"
                                        ></v-select>
                                    </v-col>

                                    <v-col md="6">
                                        <v-select
                                            label="Status Pernikahan"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-text>
                                <v-row>
                                    <v-col md="4">
                                        <v-radio-group class="mt-0" column hide-details>
                                            <template v-slot:label>
                                                <div class="font-weight-bold">Sebagai PNS</div>
                                            </template>

                                            <v-radio
                                                label="Bukan PNS"
                                                value="radio-1"
                                            ></v-radio>

                                            <v-radio
                                                label="PNS"
                                                value="radio-2"
                                            ></v-radio>
                                        </v-radio-group>
                                    </v-col>

                                    <v-col md="4">
                                        <v-radio-group class="mt-0" column hide-details>
                                            <template v-slot:label>
                                                <div class="font-weight-bold">Jenis Kelamin</div>
                                            </template>

                                            <v-radio
                                                label="Perempuan"
                                                value="radio-1"
                                            ></v-radio>

                                            <v-radio
                                                label="Laki-laki"
                                                value="radio-2"
                                            ></v-radio>
                                        </v-radio-group>
                                    </v-col>

                                    <v-col md="4">
                                        <v-radio-group class="mt-0" column hide-details>
                                            <template v-slot:label>
                                                <div class="font-weight-bold">Status Hidup</div>
                                            </template>

                                            <v-radio
                                                label="Hidup"
                                                value="radio-1"
                                            ></v-radio>

                                            <v-radio
                                                label="Meninggal"
                                                value="radio-2"
                                            ></v-radio>
                                        </v-radio-group>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                        </v-sheet>
                        
                        <v-divider class="my-3"></v-divider>
                        
                        <v-sheet class="ma-1 d-flex">
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="step = parseInt(step) + 1">lanjutkan</v-btn>
                        </v-sheet>
                    </v-stepper-content>

                    <v-stepper-content step="2">
                        <v-sheet :color="`grey lighten-4`" class="ma-1 px-4 py-1" rounded="lg">
                            <mono-file-upload
                                class="mb-3"
                                label="Dokumen Kartu Keluarga (KK)"
                                hint="Tap disini pilih file dari perangkat Anda."
                            ></mono-file-upload>

                            <mono-file-upload
                                class="mb-3"
                                label="Dokumen Akta Kelahiran - Anak"
                                hint="Tap disini pilih file dari perangkat Anda."
                            ></mono-file-upload>
                        </v-sheet>
                        
                        <v-divider class="my-3"></v-divider>
                        
                        <v-sheet class="ma-1 d-flex">
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="step = parseInt(step) + 1">lanjutkan</v-btn>
                        </v-sheet>
                    </v-stepper-content>

                    <v-stepper-content step="3">
                        <v-sheet :color="`grey lighten-4`" class="ma-1 px-4 py-1" rounded="lg">
                            <div class="pt-6 text-subtitle-1 font-weight-bold">Masukan Data</div>

                            <v-simple-table class="mt-2 v-data-table--nohover">
                                <template v-slot:default>
                                    <tbody>
                                        <tr>
                                            <td class="overline grey--text text--darken-1">Sebagai PNS</td>
                                            <td class="text-right">{{ record.name }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Nama</td>
                                            <td class="text-right">{{ record.slug }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Tempat Lahir</td>
                                            <td class="text-right">{{ record.path }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Tanggal Lahir</td>
                                            <td class="text-right">{{ record.icon }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Jenis Identitas</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Nomor Identitas</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Alamat</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Nomor HP</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Nomor Telpon</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Email</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Jenis Kelamin</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Agama</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Status Hidup</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Status Pernikahan</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>

                            <div class="pt-6 text-subtitle-1 font-weight-bold">Data Pendukung</div>

                            <v-simple-table class="mt-2 v-data-table--nohover">
                                <template v-slot:default>
                                    <tbody>
                                        <tr>
                                            <td class="overline grey--text text--darken-1">Dokumen Kartu Keluarga (KK)</td>
                                            <td class="text-right">{{ record.name }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Dokumen Akta Kelahiran - Anak</td>
                                            <td class="text-right">{{ record.name }}</td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>

                            <div class="pt-6 text-subtitle-1 font-weight-bold">Disclaimer</div>

                            <v-switch
                                class="mt-1"
                                label="Saya menyatakan bahwa data yang saya input benar."
                            ></v-switch>
                        </v-sheet>
                        
                        <v-divider class="my-3"></v-divider>
                        
                        <v-sheet class="ma-1 d-flex">
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="step = parseInt(step) + 1">simpan</v-btn>
                        </v-sheet>
                    </v-stepper-content>
                </v-stepper-items>
            </v-stepper>
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

    data:() => ({
        step: 1
    })
}
</script>