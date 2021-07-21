<template>
    <mono-page-form>
        <v-card-text>
            <v-row no-gutters>
                <v-col cols="12">
                    
                </v-col>
            </v-row>
        </v-card-text>
    </mono-page-form>
</template>

<script>
export default {
    computed: {
        record: function() {
            return this.$store.state.module.record;
        }
    }
}
</script>