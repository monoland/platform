<template>
    <v-data-table
        fixed-header
        :headers="page.headers"
        :height="`calc(100vh - 211px)`"
        :disable-pagination="disable_control"
        :items="records"
        :item-key="page.key"
        :server-items-length="table.total"
        :options.sync="table.options"
        :footer-props="{ 
            'disable-items-per-page': disable_control, 
            'items-per-page-options': [10, 25, 50, 100, 250] 
        }"
        :disable-sort="disable_control"
        :single-select="table.single"
        v-model="selected"
        @click:row="rowClick"
    >
        <template #progress>
            <v-progress-linear :color="theme" height="1" indeterminate></v-progress-linear>
        </template>

        <template v-slot:[`item.data-table-select`]="{ isSelected, select }">
            <v-simple-checkbox
                :color="theme"
                :value="isSelected"
                @input="select($event)"
                v-ripple
            ></v-simple-checkbox>
        </template>

        <template v-for="column in page.headers" #[`item.${column.value}`]="{ item, index }">
            <slot :name="`item.${column.value}`" :item="item" :index="index">
                <span v-html="item[column.value]" :key="index" />
            </slot>
        </template>
    </v-data-table>
</template>

<script>
export default {
    props: {
        nested: {
            type: Boolean,
            default: false
        }
    },

    computed: {
        disable_control: function() {
            if (this.$store.state.module.records && this.$store.state.module.records.length > 0) {
                return false;
            }

            return true;
        },

        page: function () {
            return this.$store.state.module.page;
        },

        records: function () {
            return this.$store.state.module.records;
        },

        selected: {
            get: function() {
                return this.$store.state.module.page.selected;
            },

            set: function(selected) {
                this.$store.commit('PAGE_SELECTED', selected);
            }
        },

        table: function () {
            return this.$store.state.module.table;
        },

        theme: function () {
            return this.$store.state.module.theme;
        }
    },

    created() {
        this.$store.commit('MODULE_DATATYPE', 'table');
    },

    methods: {
        rowClick: function(item, { select, isSelected }) {
            select(!isSelected);
        }
    }
};
</script>