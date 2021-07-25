<template>
    <v-sheet class="py-3 px-4 mt-4" rounded="lg" width="100%">
        <div class="d-flex">
            <div class="d-flex flex-column flex-grow-1 justify-center">
                <div class="text-subtitle-1 font-weight-bold line-height-1 mt-1">{{ label }}</div>
                <small class="grey--text">{{ hint }}</small>
            </div>

            <v-avatar color="grey lighten-2" size="36">
                <v-icon dark>article</v-icon>
            </v-avatar>
        </div>
    </v-sheet>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            default: ''
        },

        hint: {
            type: String,
            default: ''
        }
    }
}
</script>