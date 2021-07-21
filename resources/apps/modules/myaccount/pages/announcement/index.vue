<template>
    <mono-page-base
        name="myaccount-announcement"
        title="berita"
        url-parameter="news"
        layout-double
    >
        <mono-page-data>
            <mono-page-list>
                <template v-slot:default="{ record, index }">
                    <v-list-item :value="record.id" :key="index">
                        <v-card class="clip-corner--small my-4" elevation="0" color="white" width="100%">
                            <v-card-title>{{ record.title }}</v-card-title>
                            <v-card-text v-html="record.snippet" />
                        </v-card>
                    </v-list-item>
                </template>
            </mono-page-list>
        </mono-page-data>
    </mono-page-base>
</template>

<script>
export default {
    
}
</script>