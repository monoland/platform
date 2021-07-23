<template>
    <mono-page-form
        :click-link="bindClickLink"
        refetch-data
    >
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Ability Information</div>
        
            <v-simple-table class="mt-2 v-data-table--nohover">
                <template v-slot:default>
                    <tbody>
                        <tr>
                            <td class="overline grey--text">Name</td>
                            <td class="text-right">{{ record.name }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text">Slug</td>
                            <td class="text-right">{{ record.slug }}</td>
                        </tr>

                        <tr>
                            <td class="overline grey--text">Module</td>
                            <td class="text-right">{{ record.module }}</td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-sheet>

        <v-sheet class="my-md-6 overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Ability pages and permissions</div>
        
            <v-simple-table class="mt-2 v-data-table--nohover" dense>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th style="width: 150px;">Page</th>
                            <th>Permission</th>
                            <th class="text-center" style="width: 50px;">Granted</th>
                        </tr>
                    </thead>

                    <tbody>
                        <template v-for="(page, pageIndex) in record.pages">
                            <template v-for="(permission, permissionIndex) in page.permissions">
                                <tr :key="pageIndex + '-' + permissionIndex" v-if="permissionIndex <= 0">
                                    <td class="overline line-height-1 grey--text" 
                                        :rowspan="page.permissions.length"
                                        style="border-right: thin solid rgba(0,0,0,.12);"
                                    >{{ page.name }}</td>
                                    <td class="overline line-height-1 grey--text">{{ permission.name }}</td>
                                    <td class="text-center">
                                        <v-icon v-if="record.permissions.indexOf(permission.slug) > -1">check_box</v-icon>
                                        <v-icon v-else>check_box_outline_blank</v-icon>
                                    </td>
                                </tr>

                                <tr :key="pageIndex + '-' + permissionIndex" v-else>
                                    <td class="overline line-height-1 grey--text">{{ permission.name }}</td>
                                    <td class="text-center">
                                        <v-icon v-if="record.permissions.indexOf(permission.slug) > -1">check_box</v-icon>
                                        <v-icon v-else>check_box_outline_blank</v-icon>
                                    </td>
                                </tr>
                            </template>
                        </template>
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
            theme: state => state.theme
        }),
    },

    methods: {
        bindClickLink: function(link) {
            this.$router.push({ name: link.slug })
        }
    }
}
</script>