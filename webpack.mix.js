const mix = require('laravel-mix');

require('vuetifyjs-mix-extension');

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
    .vuetify('vuetify-loader', {
        extract: '[name].css'
    })
    .vue()
    .sass('resources/styles/monoland.scss', 'public/styles')
    .extract([
        'axios', 'debounce', 'pdfjs-dist', 'vue', 'vue-router', 'vuetify', 'vuex'
    ]);