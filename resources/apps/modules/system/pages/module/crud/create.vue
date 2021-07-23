<template>
    <mono-page-form>
        <v-sheet class="overflow-hidden" rounded="lg">
            <div class="px-4 pt-4 text-h6">Create new module</div>

            <v-card-text>
                <v-row no-gutters>
                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Name"
                            v-model="record.name"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Icon"
                            hint="https://fonts.google.com/icons"
                            v-model="record.icon"
                        >
                            <template v-slot:message="{ message }">
                                <a :href="message" target="_blank">{{ message }}</a>
                            </template>
                        </v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Slug"
                            v-model="record.slug"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-text-field
                            autocomplete="off"
                            label="Path"
                            v-model="record.path"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-select
                            :items="colors"
                            autocomplete="off"
                            label="Color"
                            v-model="record.color"
                        >
                            <template v-slot:selection="{ item }">
                                <v-icon :color="item">gradient</v-icon>
                                <span class="ml-2">{{item}}</span>
                            </template>

                            <template v-slot:item="{ item, on, attrs }">
                                <v-list-item v-on="on" v-bind="attrs">
                                    <v-list-item-icon>
                                        <v-icon :color="item">gradient</v-icon>
                                    </v-list-item-icon>

                                    <v-list-item-content>
                                        <v-list-item-title>{{ item }}</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>
                            </template>
                        </v-select>
                    </v-col>

                    <v-col cols="12">
                        <v-textarea
                            autocomplete="off"
                            label="Describe"
                            v-model="record.describe"
                        ></v-textarea>
                    </v-col>

                    <v-col cols="12">
                        <v-switch
                            inset
                            label="Visibility"
                            v-model="record.visibility"
                        ></v-switch>
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
    },

    data:() => ({
        colors: [
            'red', 'pink', 'purple', 'deep-purple', 
            'indigo', 'blue', 'light-blue', 'cyan', 
            'teal', 'green', 'light-green', 'lime',
            'yellow', 'amber', 'orange', 'deep-orange',
            'brown', 'blue-grey', 'grey'
        ]
    })
}
</script>