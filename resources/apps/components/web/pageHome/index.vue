<template>
    <div class="d-flex flex-column height-100" :class="theme">
        <template v-if="docks.length <= 0">
            <v-sheet :color="theme">
                <v-toolbar class="clip-corner" :color="`${theme} lighten-4`">
                    <v-toolbar-title class="overline text-center grey--text width-100">anda tidak memiliki halaman lain.</v-toolbar-title>
                </v-toolbar>
            </v-sheet>
        </template>

        <template v-else>
            <v-sheet :color="theme">
                <v-sheet class="clip-corner px-8 py-2" :color="`${theme} lighten-4`">
                    <div class="row justify-center no-gutters align-start">
                        <template v-for="(page, index) in docks">
                            <v-col cols="1" :key="`page-${index}`" v-if="index < 11" style="height: 100%;">
                                <v-sheet 
                                    :color="`${theme} lighten-5`" 
                                    class="d-flex flex-column ma-2 overflow-hidden" 
                                    elevation="1"
                                    min-height="100"
                                    height="100%"
                                    rounded="lg"
                                    style="cursor: pointer;"
                                    @click="page.module ? openModule(page) : openPage(page)"
                                >
                                    <v-responsive class="white" min-height="65">
                                        <div class="d-flex align-center justify-center height-100">
                                            <v-icon :color="`${page.color ? page.color : theme} lighten-1`" x-large>{{ page.icon }}</v-icon>
                                        </div>
                                    </v-responsive>
                                    
                                    <div class="d-flex align-center justify-center height-100 px-2 py-2">
                                        <div class="d-flex align-center text-caption font-weight-medium justify-center text-center line-height-1-point-2 min-height-28 width-100" :class="`${theme}--text`">{{ page.name }}</div>
                                    </div>
                                </v-sheet>
                            </v-col>

                            <v-col cols="1" :key="`page-${index}`" v-if="index === 11 && docks.length === 12" style="height: 100%;">
                                <v-sheet 
                                    :color="`${theme} lighten-5`" 
                                    class="d-flex flex-column ma-2 overflow-hidden" 
                                    elevation="1"
                                    min-height="100"
                                    height="100%"
                                    rounded="lg"
                                    style="cursor: pointer;"
                                    @click="page.module ? openModule(page) : openPage(page)"
                                >
                                    <v-responsive class="white" min-height="65">
                                        <div class="d-flex align-center justify-center height-100">
                                            <v-icon :color="`${page.color ? page.color : theme} lighten-1`" x-large>{{ page.icon }}</v-icon>
                                        </div>
                                    </v-responsive>
                                    
                                    <div class="d-flex align-center justify-center height-100 px-2 py-2">
                                        <div class="d-flex align-center text-caption font-weight-medium justify-center text-center line-height-1-point-2 min-height-28 width-100" :class="`${theme}--text`">{{ page.name }}</div>
                                    </div>
                                </v-sheet>
                            </v-col>
                        </template>

                        <v-col cols="1" v-if="docks.length > 12">
                            <v-sheet 
                                class="d-flex flex-column clip-corner ma-2 elevation-0 overflow-hidden" 
                                min-height="100"
                                rounded="lg"
                                style="cursor: pointer;"
                                @click="expand = !expand"
                            >
                                <v-responsive :class="`${theme} lighten-4`" height="100%">
                                    <div class="d-flex align-center justify-center height-100">
                                        <v-icon :color="theme" large>unfold_more</v-icon>
                                    </div>
                                </v-responsive>
                            </v-sheet>
                        </v-col>
                    </div>
                </v-sheet>

                <v-expand-transition>
                    <v-sheet :color="`${theme} lighten-4`" v-show="expand">
                        <div class="relative px-8 py-2">
                            <div class="row justify-center no-gutters align-start">
                                <template v-for="(page, index) in docks">
                                    <v-col cols="1" :key="`page-${index}`" v-if="index >= 11">
                                        <v-sheet 
                                            :color="`${theme} lighten-5`" 
                                            class="d-flex flex-column ma-2 overflow-hidden" 
                                            elevation="1"
                                            min-height="100"
                                            rounded="lg"
                                            style="cursor: pointer;"
                                            @click="page.module ? openModule(page) : openPage(page)"
                                        >
                                            <v-responsive class="white" height="65">
                                                <div class="d-flex align-center justify-center height-100">
                                                    <v-icon :color="`${page.color ? page.color : theme} lighten-1`" x-large>{{ page.icon }}</v-icon>
                                                </div>
                                            </v-responsive>
                                            
                                            <div class="d-flex align-center justify-center height-100 px-2 py-2">
                                                <div class="d-flex align-center text-caption font-weight-medium justify-center text-center line-height-1-point-2 min-height-28 width-100" :class="`${theme}--text`">{{ page.name }}</div>
                                            </div>
                                        </v-sheet>
                                    </v-col>
                                </template>
                            </div>
                        </div>
                    </v-sheet>
                </v-expand-transition>
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

        theme: function() 
        {
            return this.$store.state.theme;
        }
    },

    data:() => ({
        expand: false
    }),

    methods: {
        openModule: function(module) {
            this.$router.push({ name: module.slug + '-dashboard' });
        },

        openPage: function(page) {
            this.$router.push({ name: page.slug });
        }
    }
}
</script>