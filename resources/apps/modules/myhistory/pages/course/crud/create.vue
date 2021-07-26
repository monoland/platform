<template>
    <mono-page-form
        desktop-width="800"
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Tambah riwayat diklat/kursus</div>

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
                        <v-sheet :color="`grey lighten-4`" class="ma-1 px-4 py-1" rounded="lg">
                            <v-select
                                label="Jenis Diklat/Kursus"
                            ></v-select>

                            <v-text-field
                                label="Nama Diklat"
                            ></v-text-field>

                            <v-text-field
                                label="Institusi Penyelenggara"
                            ></v-text-field>

                            <v-select
                                label="Nomor Sertifikat"
                            ></v-select>

                            <v-select
                                label="Tahun Diklat"
                            ></v-select>

                            <v-text-field
                                label="Tanggal Mulai"
                            ></v-text-field>

                            <v-text-field
                                label="Tanggal Selesai"
                            ></v-text-field>

                            <v-text-field
                                label="Durasi (JAM)"
                            ></v-text-field>
                        </v-sheet>
                        
                        <v-divider class="my-3"></v-divider>
                        
                        <v-sheet class="ma-1 d-flex">
                            <v-spacer></v-spacer>
                            <v-btn text color="grey" class="mr-1">batal</v-btn>
                            <v-btn text color="primary" @click="step = parseInt(step) + 1">lanjutkan</v-btn>
                        </v-sheet>
                    </v-stepper-content>

                    <v-stepper-content step="2">
                        <v-sheet :color="`grey lighten-4`" class="ma-1 px-4 py-1" rounded="lg">
                            <mono-file-upload
                                class="mb-3"
                                label="Dokumen Sertifikat Diklat"
                                hint="Tap disini pilih file dari perangkat Anda."
                            ></mono-file-upload>
                        </v-sheet>
                        
                        <v-divider class="my-3"></v-divider>
                        
                        <v-sheet class="ma-1 d-flex">
                            <v-spacer></v-spacer>
                            <v-btn text color="grey" class="mr-1">batal</v-btn>
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
                                            <td class="overline grey--text text--darken-1">Jenis Diklat/Kursus</td>
                                            <td class="text-right">{{ record.name }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Nama Diklat</td>
                                            <td class="text-right">{{ record.slug }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Institusi Penyelenggara</td>
                                            <td class="text-right">{{ record.path }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Nomor Sertifikat</td>
                                            <td class="text-right">{{ record.icon }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Tahun Diklat</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Tanggal Mulai</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Tanggal Selesai</td>
                                            <td class="text-right">{{ record.visibility }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">Durasi (JAM)</td>
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
                                            <td class="overline grey--text text--darken-1">Dokumen Sertifikat Diklat</td>
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
                            <v-btn text color="grey" class="mr-1">batal</v-btn>
                            <v-btn text color="primary" @click="step = parseInt(step) + 1">lanjutkan</v-btn>
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