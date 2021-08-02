<template>
    <v-sheet class="d-flex relative" :color="`${theme} lighten-3`" height="100%">
        <template v-if="page.layoutDouble">
            <v-sheet 
                :color="theme"
                height="calc(100vh - 88px)"
                width="400"
                flat
            >
                <v-sheet
                    :color="`${theme} lighten-4`"
                    class="relative clip-corner"
                    height="100%" 
                    width="100%"
                    flat
                >
                    <slot></slot>
                </v-sheet>
            </v-sheet>
            
            <v-sheet 
                class="relative"
                :color="theme"
                height="calc(100vh - 88px)"
                width="100%"
                max-width="calc(100% - 400px)" 
                flat
            >
                <div class="absolute v-sheet--shadow z-index-1"></div>
                
                <v-sheet
                    :color="`${theme} lighten-4`"
                    class="clip-corner"
                    height="100%" 
                    width="100%"
                    flat
                    
                >
                    <slot name="form"></slot>

                    <v-overlay z-index="1" color="white" width="100%" height="100%" v-model="fab"></v-overlay>
                </v-sheet>
            </v-sheet>
        </template>

        <template v-else-if="page.layoutSingle">
            <v-sheet 
                class="relative"
                :color="theme"
                height="calc(100vh - 88px)"
                width="100%"
                max-width="100%" 
                flat
            >
                <v-sheet
                    :color="`${theme} lighten-4`"
                    class="clip-corner"
                    height="100%" 
                    width="100%"
                    flat
                >
                    <slot name="form"></slot>
                </v-sheet>
            </v-sheet>
        </template>

        <template v-else>
            <v-sheet 
                :color="theme"
                height="calc(100vh - 88px)"
                width="100%"
                flat
            >
                <v-sheet
                    :color="`${theme} lighten-4`"
                    class="relative clip-corner"
                    height="100%" 
                    width="100%"
                    flat
                >
                    <slot></slot>
                </v-sheet>

                <v-overlay z-index="1" color="white" width="100%" height="100%" v-model="fab"></v-overlay>
            </v-sheet>

            <v-fade-transition>
                <v-sheet 
                    class="absolute absolute--top absolute--left"
                    :color="theme"
                    height="calc(100vh - 88px)"
                    width="100%"
                    max-width="100%" 
                    flat
                    v-show="route.path !== 'index'"
                >
                    <v-sheet
                        :color="`${theme} lighten-4`"
                        class="clip-corner"
                        height="100%" 
                        width="100%"
                        flat
                    >
                        <slot name="form"></slot>

                        <v-overlay z-index="1" color="white" width="100%" height="100%" v-model="fab"></v-overlay>
                    </v-sheet>
                </v-sheet>
            </v-fade-transition>
        </template>

        <v-fab-transition>
            <v-btn v-if="route.path === 'index' && !parentId && !page.filter.status && !searchStatus && hasPermission('create')"
                :color="theme"
                key="index"
                absolute
                fab dark
                large
                style="bottom: 27px; right: 27px;"
                @click="openPageCreate"
            >
                <v-icon>add</v-icon>
            </v-btn>

            <v-speed-dial v-else-if="route.path === 'index' && parentId "
                v-model="fab"
                key="nested-index"
                absolute
                style="bottom: 27px; right: 27px;"
                transition="slide-y-reverse-transition"
            >
                <template v-slot:activator>
                    <v-btn
                        v-model="fab"
                        :key="route.path"
                        :color="theme"
                        fab dark
                        large
                    >
                        <v-icon v-if="fab">close</v-icon>
                        <v-icon v-else>fact_check</v-icon>
                    </v-btn>
                </template>

                <div class="d-flex relative align-center" v-if="hasPermission('create') && page.mode === 'default'">
                    <div 
                        :class="theme"
                        class="caption text-capitalize absolute line-height-1 white--text px-2 py-1 rounded" 
                        style="right: 52px;"
                    >tambah</div>
                    
                    <v-btn small :color="theme" fab dark @click="openPageCreate">
                        <v-icon>add</v-icon>
                    </v-btn>
                </div>

                <div class="d-flex relative align-center" v-if="hasPermission('create') && page.mode === 'default'">
                    <div 
                        :class="theme"
                        class="caption text-capitalize absolute line-height-1 white--text px-2 py-1 rounded" 
                        style="right: 52px;"
                    >detail</div>
                    
                    <v-btn small :color="theme" fab dark @click="openPageShow">
                        <v-icon>folder_open</v-icon>
                    </v-btn>
                </div>
            </v-speed-dial>

            <v-speed-dial v-if="route.path === 'show' && hasPermission('show')"
                v-model="fab"
                absolute
                style="bottom: 27px; right: 27px;"
                transition="slide-y-reverse-transition"
            >
                <template v-slot:activator>
                    <v-btn
                        v-model="fab"
                        :key="route.path"
                        :color="theme"
                        fab dark
                        large
                    >
                        <v-icon v-if="fab">close</v-icon>
                        <v-icon v-else>layers</v-icon>
                    </v-btn>
                </template>

                <v-btn v-if="hasPermission('print') && page.mode === 'default'"
                    color="teal" 
                    dark fab small
                    @click="openPagePrint"
                >
                    <v-icon>print</v-icon>
                </v-btn>

                <template v-if="page.mode === 'default'">
                    <div class="d-flex relative align-center" v-for="(link, linkIndex) in page.links" :key="linkIndex">
                        <div 
                            class="caption text-capitalize absolute line-height-1 blue white--text px-2 py-1 rounded" style="right: 52px;"
                            v-html="link.text"
                        ></div>
                        
                        <v-btn
                            color="blue" 
                            dark fab small
                            @click="openPageLink(link)"
                        >
                            <v-icon>{{ link.icon }}</v-icon>
                        </v-btn>
                    </div>
                </template>

                <div class="d-flex relative align-center" v-if="hasPermission('update') && page.mode === 'default'">
                    <div class="caption text-capitalize absolute line-height-1 green white--text px-2 py-1 rounded" style="right: 52px;">edit</div>
                    
                    <v-btn small color="green" fab dark @click="openPageEdit">
                        <v-icon>edit</v-icon>
                    </v-btn>
                </div>

                <div class="d-flex relative align-center" v-if="hasPermission('delete') && page.mode === 'default'">
                    <div class="caption text-capitalize absolute line-height-1 deep-orange white--text px-2 py-1 rounded" style="right: 52px;">hapus</div>

                    <v-btn small color="deep-orange" fab dark @click="openPageDelete">
                        <v-icon>delete</v-icon>
                    </v-btn>
                </div>

                <div class="d-flex relative align-center" v-if="hasPermission('restore') && page.mode === 'trashed'">
                    <div class="caption text-capitalize absolute line-height-1 green white--text px-2 py-1 rounded" style="right: 52px;">restore</div>

                    <v-btn small color="green" fab dark @click="postRestore">
                        <v-icon>model_training</v-icon>
                    </v-btn>
                </div>

                <div class="d-flex relative align-center" v-if="hasPermission('destroy') && page.mode === 'trashed'">
                    <div class="caption text-capitalize absolute line-height-1 deep-orange white--text px-2 py-1 rounded" style="right: 52px;">destroy</div>

                    <v-btn small color="deep-orange" fab dark @click="openPageDestroy">
                        <v-icon>delete_sweep</v-icon>
                    </v-btn>
                </div>
            </v-speed-dial>
        </v-fab-transition>

        <v-dialog
            v-model="dialog_delete"
            persistent
            max-width="320"
        >
            <v-card class="clip-corner">
                <v-card-title class="text-h6">Hapus data ini?</v-card-title>
                
                <v-card-text>Proses ini akan juga menghapus semua data yang terkait pada data ini.</v-card-text>
                
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn :color="theme" text @click="dialog_delete = false">Batal</v-btn>
                    <v-btn color="error" depressed dark @click="postDelete">Hapus</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-dialog
            v-model="dialog_destroy"
            persistent
            max-width="320"
        >
            <v-card class="clip-corner">
                <v-card-title class="text-h6">Hapus data ini?</v-card-title>
                
                <v-card-text>Proses ini akan juga menghapus semua data yang terkait pada data ini.</v-card-text>
                
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn :color="theme" text @click="dialog_destroy = false">Batal</v-btn>
                    <v-btn color="error" depressed dark @click="postDestroy">Hapus</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-sheet>
</template>

<script>
import { mapState } from 'vuex';

export default {
    props: {
        layoutDouble: {
            type: Boolean,
            default: false
        },

        layoutSingle: {
            type: Boolean,
            default: false
        }
    },

    computed: {
        ...mapState({
            page: state => state.module.page,
            parentId: state => state.module.parentId,
            route: state => state.route,
            searchStatus: state => state.module.page.search.status,
            theme: state => state.theme,
        }),
    },

    data:() => ({
        dialog_delete: false,
        dialog_destroy: false,
        fab: false,
    }),

    methods: {
        hasPermission: function(keys) {
            if (! Array.isArray(keys)) {
                return this.page.features.indexOf(keys) !== -1;
            }

            return keys.some(key => {
                if (this.page.features.indexOf(key) !== -1) {
                    return true;
                }
            });
        },
        
        openPageCreate: function() {
            this.$store.commit('PAGE_ACTION', { name: 'create' });
        },

        openPageDelete: function() {
            this.dialog_delete = true;
        },

        openPageDestroy: function() {
            this.dialog_destroy = true;
        },

        openPageEdit: function() {
            this.$store.commit('PAGE_ACTION', { name: 'edit' });
        },

        openPageLink: function(link) {
            this.$store.state.bindClickLink(link);
        },

        openPagePrint: function() {
            this.$store.commit('PAGE_ACTION', { name: 'print' });
        },

        openPageShow: function() {
            this.$store.commit('PAGE_ACTION', { name: 'show' });
        },

        postDelete: function() {
            this.$store.dispatch('delete_record').then(({ commit }) => {
                this.dialog_delete = false;
                commit('PAGE_ACTION', { name: 'index' });
            });
        },

        postDestroy: function() {
            this.$store.dispatch('destroy_record').then(({ commit }) => {
                this.dialog_destroy = false;
                commit('PAGE_ACTION', { name: 'index' });
            });
        },

        postRestore: function() {
            this.$store.dispatch('restore_record').then(({ commit }) => {
                commit('PAGE_ACTION', { name: 'index' });
            });
        },
    },
}
</script>