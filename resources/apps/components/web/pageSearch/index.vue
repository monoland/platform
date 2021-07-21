<template>
    <v-fade-transition>
        <v-app-bar v-show="page.search.status"
            class="clip-corner"
            :color="theme"
            absolute
            dark
            flat
        >
            <v-text-field
                :color="theme"
                :label="`Cari data pada halaman ini`"
                :prepend-inner-icon="page.icon"
                ref="search"
                autocomplete="off"
                clearable
                dense
                flat
                hide-details
                solo-inverted
                class="mr-2"
                v-model="page.search.findBy"
            ></v-text-field>

            <v-btn icon @click="page.search.status = false">
                <v-icon>menu_open</v-icon>
            </v-btn>
        </v-app-bar>
    </v-fade-transition>
</template>

<script>
import { debounce } from 'debounce';
import { mapState } from 'vuex';

export default {
    computed: {
        ...mapState({
            page: state => state.module.page,
            theme: state => state.theme,
        })
    },
    
    methods: {
        searchBouncing: debounce(function (value) {
            this.$store.commit('BUILD_REQUEST_PARAMS', { search: value });
            this.$store.state.module.records = [];
            this.$store.dispatch('fetch_records', { reset: true });
        }, 1000),
    },

    watch: {
        'page.search.status': {
            handler: function(status) {
                if (status) {
                    setTimeout(() => {
                        this.$refs.search.focus();
                    }, 100);
                }
            },

            immediate: true
        },

        'page.search.findBy': function(value) {
            this.searchBouncing(value);
        }
    }
}
</script>