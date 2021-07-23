<template>
    <mono-page-form>
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Create new ability</div>
            
            <v-card-text>
                <v-row no-gutters>
                    <v-col cols="12">
                        
                    </v-col>
                </v-row>
            </v-card-text>
        </v-sheet>
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