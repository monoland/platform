<template>
    <v-sheet
        :color="theme"
        height="100%"
        width="100%"
    >
        <v-toolbar 
            :color="`${theme} lighten-4`"  
            :flat="true"
            class="clip-corner z-index-1"
        >
            <v-btn icon disabled></v-btn>

            <v-spacer></v-spacer>
            
            <v-toolbar-title class="text-uppercase text-subtitle-1">
                <span class="overline" v-if="page.filter.status">filter </span>
                <span class="overline">{{ page.title }}-{{ route.path }}</span>
                <span class="overline" v-if="! page.filter.status && page.mode === 'trashed'"> - trashed</span>
            </v-toolbar-title>
            
            <v-spacer></v-spacer>
            
            <v-btn icon @click="page.filter.status = !page.filter.status">
                <v-fade-transition>
                    <v-icon v-if="page.filter.status">close</v-icon>
                    <v-icon v-else>filter_list</v-icon>
                </v-fade-transition>
            </v-btn>
        </v-toolbar>

        <v-expand-transition>
            <mono-page-filter v-show="page.filter.status" top="-10px"></mono-page-filter>
        </v-expand-transition>

        <v-sheet
            :color="`${theme} lighten-4`"
            height="calc(100vh - 168px)" 
            width="100%"
        >
            <v-sheet
                :color="`${theme} lighten-5`"
                height="calc(100vh - 168px)" 
                width="100%"
                class="clip-corner"
            >
                <v-responsive
                    class="overflow-y-auto"
                    height="calc(100vh - 152px)"
                >
                    <slot></slot>
                </v-responsive>

                <v-overlay :color="`${theme} lighten-3`" opacity="1" absolute :value="page.filter.status"></v-overlay>
            </v-sheet>
        </v-sheet>
    </v-sheet>
</template>

<script>
import { mapState } from 'vuex';

export default {
    computed: {
        ...mapState({
            page: state => state.module.page,
            route: state => state.route,
            theme: state => state.theme,
        })
    }
}
</script>