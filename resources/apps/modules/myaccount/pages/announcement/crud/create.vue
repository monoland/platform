<template>
    <mono-page-form>
        <v-card-text>
            <v-row no-gutters>
                <v-col cols="12">
                    <v-text-field
                        label="Title"
                        v-model="record.title"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-textarea
                        label="Highlight"
                        v-model="record.snippet"
                        :rules="rules"
                        counter
                    ></v-textarea>
                </v-col>

                <v-col cols="12">
                    <v-text-editor
                        label="Article"
                        v-model="record.article"
                    ></v-text-editor>
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
    },

    data:() => ({
        rules: [v => v && v.length <= 150 || 'Max 25 characters'],
    })
}
</script>