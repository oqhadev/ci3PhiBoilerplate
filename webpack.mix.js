const mix = require('laravel-mix');


mix.setPublicPath('assets');
mix

.js([
        'application/assets/js/backend.js',
    ], 'js/backend.js')
.styles([
    'node_modules/bootstrap3/dist/css/bootstrap.min.css',
    'node_modules/adminlte/dist/css/AdminLTE.min.css',
    'node_modules/adminlte/dist/css/skins/skin-blue.css',
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.min.css',
    'application/assets/css/backend.css',
], 'assets/css/backends.css')

.copyDirectory('node_modules/bootstrap3/fonts', 'assets/fonts/')

// .copy('node_modules/bootstrap/dist/css/bootstrap.min.css.map', 'assets/css/bootstrap.min.css.map')

.webpackConfig({
resolve: {
alias: {
jquery: "jquery/src/jquery"
}
}
})

 .extract([
 	'jquery',
 	'sweetalert2',
 	'adminlte',
 	'bootstrap3',
 	'datatables.net',
 	'datatables.net-bs',
 	'datatables.net-responsive',
 	], 'js/vendor.js')
    .scripts([
    'assets/js/manifest.js',
    'assets/js/backend.js',
    'assets/js/vendor.js',
], 'assets/js/backends.js')

.autoload({
    jquery: ['$', 'jQuery', 'jquery'],
})


if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
	mix.version();
}
