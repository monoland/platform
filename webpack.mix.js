const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        alias: {
            '@components': __dirname + '/resources/apps/components',
            '@modules': __dirname + '/resources/apps/modules',
            '@pages': __dirname + '/resources/apps/pages',
            '@mixins': __dirname + '/resources/apps/mixins',
            '@plugins': __dirname + '/resources/apps/plugins'
        }
    }
});

mix.js('resources/apps/monoland.js', 'public/scripts')
    .vue()
    .sourceMaps()
    .css('node_modules/vuetify/dist/vuetify.min.css', 'public/styles')
    .sass('resources/styles/monoland.scss', 'public/styles')
    .extract([
        'axios', 'debounce', 'pdfjs-dist', 'vue', 'vue-router', 'vuetify', 'vuex'
    ]);