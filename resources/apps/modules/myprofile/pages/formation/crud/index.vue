<template>
    <mono-page-form
        color="transparent"
        elevation="0"
        desktop-width="800"
        mobile-width="100vw"
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Posisi</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">instansi induk</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">instansi kerja</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">satuan kerja induk</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">kanreg kerja</td>
                            <td class="text-right">{{ record.icon }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">unor nama</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">unor induk</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">eselon</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">lokasi kerja</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">kppn</td>
                            <td class="text-right">{{ record.visibility }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">taspen</td>
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