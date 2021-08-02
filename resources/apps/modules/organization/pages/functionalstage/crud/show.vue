<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Rumpun Fungsional</div>
            
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">name</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>

        <v-sheet class="overflow-hidden mt-6" rounded="lg">
            <div class="px-4 pt-4 text-h6">Statistik di Pegawai</div>
            
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text text--darken-1">pria</td>
                            <td class="text-right">0</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">wanita</td>
                            <td class="text-right">0</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text text--darken-1">total</td>
                            <td class="text-right">0</td>
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
            route: state => state.route,
        })
    },

    methods: {
        bindClickLink: function(link) {
            this.$router.push({ name: link.slug, params: this.route.params })
        }
    }
}
</script>