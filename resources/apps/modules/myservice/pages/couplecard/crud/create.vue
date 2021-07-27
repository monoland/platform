<template>
    <mono-page-form
        desktop-width="800"
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Pengajuan Karis/Karsu</div>

            <v-stepper v-model="step">
                <v-stepper-header>
                    <v-stepper-step
                        class="py-0"
                        step="1"
                    >
                        Masukan data
                        <small class="mt-1" style="max-width: 168px;">Silahkan masukan data dokumen</small>
                    </v-stepper-step>

                    <v-stepper-step
                        class="py-0"
                        step="2"
                    >
                        Upload dokumen
                        <small class="mt-1" style="max-width: 168px;">Silahkan upload dokumen untuk di verifikasi.</small>
                    </v-stepper-step>

                    <v-stepper-step
                        class="py-0"
                        step="3"
                    >
                        Ringkasan
                        <small class="mt-1" style="max-width: 168px;">Silahkan periksa kembali data anda.</small>
                    </v-stepper-step>
                </v-stepper-header>
                
                <v-stepper-items>
                    <v-stepper-content step="1">
                        <v-sheet :color="`grey lighten-4`" class="ma-1" rounded="lg">
                            <v-card-text class="px-5">
                                <v-row>
                                    <v-col md="12">
                                        <v-textarea
                                            label="Alasan Pengajuan Karis/Karsu"
                                            auto-grow
                                            hide-details
                                        ></v-textarea>
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
                                label="Dokumen Daftar Keluarga Pegawai Negeri Sipil"
                                hint="Tap disini pilih file dari perangkat Anda."
                            ></mono-file-upload>

                            <mono-file-upload
                                class="mb-3"
                                label="Dokumen Laporan Kehilangan Karis/Kartu"
                                hint="Tap disini pilih file dari perangkat Anda."
                            ></mono-file-upload>

                            <mono-file-upload
                                class="mb-3"
                                label="Dokumen Laporan Perkawinan"
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
                                            <td class="overline grey--text text--darken-1">nama</td>
                                            <td class="text-right">{{ record.name }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">nip</td>
                                            <td class="text-right">{{ record.slug }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">golongan ruang</td>
                                            <td class="text-right">{{ record.path }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">jabatan</td>
                                            <td class="text-right">{{ record.path }}</td>
                                        </tr>

                                        <tr>
                                            <td class="overline grey--text text--darken-1">satuan organisasi</td>
                                            <td class="text-right">{{ record.path }}</td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>

                            <div class="pt-6 text-subtitle-1 font-weight-bold">Data Pendukung</div>

                            <v-simple-table class="mt-2 v-data-table--nohover">
                                <template v-slot:default>
                                    <tbody>
                                        <tr>
                                            <td class="overline grey--text text--darken-1">Dokumen Laporan Kehilangan Karpeg</td>
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
        }),

        vacation_range: function() {
            return this.vacation_date.join(' s/d ');
        },
    },

    data:() => ({
        step: 1,
    })
}
</script>