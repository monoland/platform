<template>
    <mono-page-form
        desktop-width="800"
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Tambah riwayat keluarga</div>

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
                            <!-- pasangan -->
                            <v-select
                                label="Pilih Suami/Istri ke"
                            ></v-select>

                            <v-radio-group column>
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

                            <!-- anak -->
                            <v-select
                                label="Pilih Pasangan"
                            ></v-select>

                            <v-text-field
                                label="Nama"
                            ></v-text-field>

                            <v-text-field
                                label="Tempat Lahir"
                            ></v-text-field>

                            <v-text-field
                                label="Tanggal Lahir"
                            ></v-text-field>
                            
                            <!-- anak -->
                            <v-select
                                label="Pilih Status Anak"
                            ></v-select>

                            <v-select
                                label="Pilih Jenis Identitas"
                            ></v-select>

                            <v-text-field
                                label="Nomor Identitas"
                            ></v-text-field>

                            <!-- pasangan -->
                            <v-text-field
                                label="Nomor Karis/Karsu"
                            ></v-text-field>

                            <v-text-field
                                label="Alamat"
                            ></v-text-field>

                            <v-text-field
                                label="Nomor HP"
                            ></v-text-field>

                            <v-text-field
                                label="Nomor Telpon"
                            ></v-text-field>

                            <v-text-field
                                label="Email"
                            ></v-text-field>

                            <v-radio-group column>
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

                            <v-select
                                label="Pilih Agama"
                            ></v-select>

                            <v-radio-group column>
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

                            <v-text-field
                                label="Nomor Akta Kelahiran"
                            ></v-text-field>

                            <v-select
                                label="Status Pernikahan"
                            ></v-select>
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
                                label="Dokumen Kartu Keluarga (KK)"
                                hint="Tap disini pilih file dari perangkat Anda."
                            ></mono-file-upload>

                            <mono-file-upload
                                class="mb-3"
                                label="Dokumen Akta Kelahiran - Anak"
                                hint="Tap disini pilih file dari perangkat Anda."
                            ></mono-file-upload>

                            <mono-file-upload
                                class="mb-3"
                                label="Dokumen Akta Nikah/Surat Nikah/Buku Nikah"
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