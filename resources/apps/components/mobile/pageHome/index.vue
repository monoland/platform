<template>
    <v-card :color="theme" height="100%" flat tile>
        <v-responsive
            id="mobile-content"
            class="overflow-y-auto"
            height="100%"
            style="z-index: 0;"
        >
            <div class="d-flex flex-column height-100" :class="theme">
                <div class="d-block">
                    <v-responsive :aspect-ratio="16/9">
                        <div class="d-flex flex-column pa-4 height-100 align-center justify-center">
                            <v-avatar :color="`${theme} lighten-3`">
                                <img :src="setting.product_logo" alt="logo" v-if="!profile.avatar">
                            </v-avatar>

                            <div class="text-subtitle-1 font-weight-medium text-uppercase white--text line-height-1 mt-3">
                                {{ profile.name }}
                            </div>

                            <div class="caption white--text">{{ profile.email }}</div>
                        </div>
                    </v-responsive>
                </div>

                <template v-if="docks.length <= 0">
                    <v-sheet :color="theme">
                        <v-toolbar class="clip-corner" :color="`${theme} lighten-4`">
                            <v-toolbar-title class="overline text-center grey--text width-100">anda tidak memiliki halaman lain.</v-toolbar-title>
                        </v-toolbar>
                    </v-sheet>
                </template>
                
                <template v-else>
                    <v-sheet :color="theme">
                        <v-sheet class="clip-corner" :color="`${theme} lighten-4`">
                            <div class="row justify-center no-gutters align-start">
                                <template v-for="(page, index) in docks">
                                    <v-col cols="3" :key="`page-${index}`">
                                        <v-card 
                                            :color="`${theme} lighten-5`" 
                                            class="d-flex flex-column clip-corner ma-2 elevation-0 rounded-lg" 
                                            height="100"
                                            @click="page.module ? openModule(page) : openPage(page)"
                                        >
                                            <v-responsive class="white" height="65">
                                                <div class="d-flex align-center justify-center height-100">
                                                    <v-icon :color="`${theme} lighten-1`" x-large>{{ page.icon }}</v-icon>
                                                </div>
                                            </v-responsive>
                                            
                                            <div class="d-flex align-center justify-center height-100">
                                                <div class="text-caption font-weight-medium text-truncate line-height-1" :class="`${theme}--text`">{{ page.name }}</div>
                                            </div>
                                        </v-card>
                                    </v-col>
                                </template>
                            </div>
                        </v-sheet>
                    </v-sheet>
                </template>

                <div class="relative flex-grow-1" :class="`${theme} lighten-4`">
                    <div class="relative d-flex flex-column height-100">
                        <div class="relative clip-corner" :class="`${theme} lighten-4`">
                            <v-toolbar :color="`${theme} lighten-5`" dense flat>
                                <v-toolbar-title>
                                    <div class="overline">{{ title }}</div>
                                </v-toolbar-title>
                            </v-toolbar>
                        </div>
                        
                        <div class="relative flex-grow-1 d-flex flex-column" :class="`${theme} lighten-5`">
                            <div class="relative clip-corner flex-grow-1 white">
                                <v-responsive
                                    class="overflow-y-auto"
                                    height="100%"
                                    style="z-index: 0;"
                                >
                                    <slot></slot>
                                </v-responsive>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </v-responsive>
    </v-card>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: null
        },
    },

    computed: {
        docks: function() 
        {
            if ('docks' in this.$store.state.module) {
                return this.$store.state.module.docks;
            }
            
            return [];
        },

        module: function() {
            return this.$store.state.module;
        },

        page: function() {
            return this.$store.state.module.page;
        },

        theme: function() {
            return this.$store.state.theme;
        }
    },

    data:() => ({
        dialogLogout: false,
        profile: {},
        setting: {},
    }),

    created() {
        this.profile = this.$store.state.auth.getItem('profile');
        this.setting = this.$store.state.auth.getItem('appsInfo');
    },

    methods: {
        openModule: function(module) {
            this.$router.push({ name: module.slug + '-dashboard' });
        },

        openPage: function(page) {

        }
    }
}
</script>