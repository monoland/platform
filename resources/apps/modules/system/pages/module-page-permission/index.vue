<template>
    <mono-page-base
        name="system-permission"
        title="permission"
    >
        <mono-page-data>
            <mono-page-table>
                <template v-slot:mobile_record="{ record, index }">
                    <v-list-item :value="record.id" :key="index">
                        <template v-slot:default="{ active }">
                            <v-list-item-avatar class="elevation-1" color="white">
                                <v-icon :color="theme">{{ active ? 'check' : page.icon }}</v-icon>
                            </v-list-item-avatar>

                            <v-list-item-content>
                                <v-list-item-title>{{ record.name }}</v-list-item-title>
                                <v-list-item-subtitle>{{ record.updated_at }}</v-list-item-subtitle>
                            </v-list-item-content>
                        </template>
                    </v-list-item>

                    <v-divider :key="`divider-${index}`"></v-divider>
                </template>
            </mono-page-table>
        </mono-page-data>
    </mono-page-base>
</template>

<script>
import { mapState } from 'vuex';

export default {
    computed: {
        ...mapState({
            page: state => state.module.page,
            theme: state => state.theme
        })
    }
}
</script>