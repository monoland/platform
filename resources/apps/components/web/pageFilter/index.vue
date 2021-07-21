<template>
    <v-sheet
        :color="`${theme} lighten-4`"
        :height="height"
        :width="width"
        tile
    >
        <div class="absolute v-sheet--shadow-top z-index-1" :style="`top: ${top};`"></div>
        
        <v-responsive
            :height="height"
            class="overflow-y-auto"
        >
            <v-sheet color="transparent" class="mx-auto" max-width="400" width="400">
                <!-- mode data => default | trash -->
                <v-card-text>
                    <v-sheet
                        class="clip-corner overflow-hidden"
                        width="100%"
                        rounded
                    >
                        <v-toolbar :color="`${theme} lighten-5`" dense flat>
                            <v-icon class="mr-3">light_mode</v-icon>
                            <v-toolbar-title class="overline">mode data</v-toolbar-title>
                        </v-toolbar>

                        <v-card-text class="pt-0">
                            <v-radio-group
                                v-model="page.mode"
                                hide-details
                                row
                            >
                                <v-radio value="default">
                                    <template v-slot:label>
                                        <div class="overline">default</div>
                                    </template>
                                </v-radio>

                                <v-radio 
                                    :disabled="! hasPermission('trashed')"
                                    value="trashed"
                                >
                                    <template v-slot:label>
                                        <div class="overline">trashed</div>
                                    </template>
                                </v-radio>
                            </v-radio-group>
                        </v-card-text>

                        <v-divider></v-divider>

                        <v-card-text>
                            <v-btn 
                                :color="theme" 
                                :dark="hasPermission('trashed')"
                                :disabled="! hasPermission('trashed')"
                                depressed 
                                block
                                @click="applyPageMode"
                            >ubah mode</v-btn>
                        </v-card-text>
                    </v-sheet>
                </v-card-text>

                <v-divider></v-divider>

                <!-- kolom pencarian data -->
                <v-card-text>
                    <v-sheet
                        class="clip-corner overflow-hidden"
                        width="100%"
                        rounded
                    >
                        <v-toolbar :color="`${theme} lighten-5`" dense flat>
                            <v-icon class="mr-3">sticky_note_2</v-icon>
                            <v-toolbar-title class="overline">kolom pencarian data</v-toolbar-title>
                        </v-toolbar>

                        <v-card-text class="pt-0">
                            <v-select
                                v-model="page.search.findOn"
                                :disabled="! hasPermission('search')"
                                :items="page.finds"
                                hide-details
                            ></v-select>
                        </v-card-text>

                        <v-divider></v-divider>

                        <v-card-text>
                            <v-btn 
                                :color="theme" 
                                :dark="hasPermission('search')"
                                :disabled="! hasPermission('search')"
                                depressed 
                                block 
                                @click="applyPageSearch"
                            >ubah kolom</v-btn>
                        </v-card-text>
                    </v-sheet>
                </v-card-text>

                <v-divider></v-divider>

                <!-- import dan export -->
                <v-card-text>
                    <v-sheet
                        class="clip-corner overflow-hidden"
                        width="100%"
                        rounded
                    >
                        <v-toolbar :color="`${theme} lighten-5`" dense flat>
                            <v-icon class="mr-3">file_upload</v-icon>
                            <v-toolbar-title class="overline">import dan export</v-toolbar-title>
                        </v-toolbar>

                        <v-card-text>
                            <v-row no-gutters>
                                <v-col cols="6" class="pr-1">
                                    <v-btn 
                                        :color="theme" 
                                        :disabled="! hasPermission('import')" 
                                        :dark="hasPermission('import')"
                                        depressed 
                                        block
                                    >import</v-btn>
                                </v-col>
                                
                                <v-col cols="6" class="pl-1">
                                    <v-btn 
                                        :color="theme" 
                                        :disabled="! hasPermission('export')" 
                                        :dark="hasPermission('export')"
                                        depressed block 
                                    >export</v-btn>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-sheet>
                </v-card-text>

                <v-divider v-if="filters.length > 0"></v-divider>

                <!-- filter data -->
                <v-card-text v-if="filters.length > 0">
                    <v-sheet
                        class="clip-corner overflow-hidden"
                        width="100%"
                        rounded
                    >
                        <v-toolbar :color="`${theme} lighten-5`" dense flat>
                            <v-icon class="mr-3">filter_alt</v-icon>
                            <v-toolbar-title class="overline">filter data</v-toolbar-title>
                        </v-toolbar>

                        <template v-for="(filter, filterIndex) in filters">
                            <div class="d-flex py-2 pl-4 pr-2 width-100" :key="`header-${filterIndex}`">
                                <div class="pr-3" style="width: calc(100% - 46px);">
                                    <span class="d-block overline text-truncate">{{ filter.text }}</span>
                                </div>
                                
                                <v-switch 
                                    v-model="filter.used"
                                    class="mt-0" 
                                    hide-details
                                    @click="resetFilterData(filterIndex)"
                                ></v-switch>
                            </div>

                            <v-expand-transition :key="`content-${filterIndex}`">
                                <v-sheet v-show="filter.used">
                                    <v-card-text>
                                        <div class="overline font-weight-light line-height-1">pilihan data</div>
                                        <v-select 
                                            v-model="filter.value.filterBy"
                                            class="mt-2 pt-0" 
                                            :items="filter.data"
                                        ></v-select>

                                        
                                        <div class="overline font-weight-light line-height-1 mt-2">operator</div>
                                        <v-radio-group
                                            v-model="filter.value.filterOp"
                                            class="mt-2"
                                            hide-details
                                            row
                                        >
                                            <v-radio v-for="(operator, operatorIndex) in filter.operators" 
                                                :key="operatorIndex"
                                                :label="operator" 
                                                :value="operator"
                                            ></v-radio>
                                        </v-radio-group>
                                    </v-card-text>
                                    
                                    <v-divider v-if="(filters.length - 1) > filterIndex"></v-divider>
                                </v-sheet>
                            </v-expand-transition>
                        </template>

                        <v-divider></v-divider>

                        <v-card-text>
                            <v-btn :color="theme" depressed block dark @click="applyPageFilters">filter data</v-btn>
                        </v-card-text>
                    </v-sheet>
                </v-card-text>
            </v-sheet>
        </v-responsive>
    </v-sheet>
</template>

<script>
export default {
    name: 'mono-page-filter',

    props: {
        height: {
            type: String,
            default: 'calc(100vh - 180px)'
        },

        top: {
            type: String,
            default: '0'
        },

        width: {
            type: String,
            default: '100%'
        },
    },
    
    computed: {
        page: function() {
            return this.$store.state.module.page
        },

        filters: function() {
            return this.$store.state.module.page.filters;
        },

        theme: function() {
            return this.$store.state.theme
        }
    },

    methods: {
        applyPageFilters: function() {
            this.$store.commit('BUILD_REQUEST_PARAMS', { mode: this.filters });
            this.page.filter.status = false;
            this.$store.dispatch('fetch_records', { reset: true });
        },

        applyPageMode: function() {
            this.$store.commit('BUILD_REQUEST_PARAMS', { mode: this.page.mode });
            this.page.filter.status = false;
            this.$store.dispatch('fetch_records', { reset: true });
        },

        applyPageSearch: function() {
            this.$store.commit('BUILD_REQUEST_PARAMS', { search: this.page.search.findBy });
            this.page.filter.status = false;
        },

        hasPermission: function(permission) {
            return this.page.features.indexOf(permission) !== -1;
        },

        resetFilterData: function(filterIndex) {
            if (! this.filters[filterIndex].used) {
                return;
            }

            this.filters[filterIndex].value.filterBy = null;
            this.filters[filterIndex].value.filterOp = null;
        },
    }
}
</script>