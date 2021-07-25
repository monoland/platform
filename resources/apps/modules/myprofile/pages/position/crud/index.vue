<template>
    <mono-page-form
        color="transparent"
        elevation="0"
        desktop-width="800"
        mobile-width="100vw"
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 pb-3 text-h6">Jabatan</div>

            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">jenis jabatan</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nama jenis jabatan</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">nama jabatan</td>
                            <td class="text-right">{{ record.path }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tmt eselon</td>
                            <td class="text-right">{{ record.icon }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">tmt jabatan</td>
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