const mix = require('laravel-mix');


mix.setPublicPath('assets');
mix
 .js([
        'application/assets/js/backend.js',
    ], 'js/backend.js')

 .extract([
 	'jquery',
 	'sweetalert2',
 	], 'js/vendor.js')
    .scripts([
    'assets/js/manifest.js',
    'assets/js/backend.js',
    'assets/js/vendor.js',
], 'assets/js/backends.js');
// mix.sass('resources/assets/sass/frontend/app.scss', 'css/frontend.css')
//     .sass('resources/assets/sass/backend/app.scss', 'css/backend.css')
//     .js('resources/assets/js/frontend/app.js', 'js/frontend.js')
//     .js([
//         'resources/assets/js/backend/before.js',
//         'resources/assets/js/backend/app.js',
//         'resources/assets/js/backend/after.js'
//     ], 'js/backend.js')
// mix.copyDirectory('node_modules/datatables/media', 'public/vendor/datatables')
//     .extract([
//         'jquery',
//         'bootstrap',
//         'popper.js/dist/umd/popper',
//         'axios',
//         'sweetalert2',
//         'lodash',
//         '@fortawesome/fontawesome-svg-core',
//         '@fortawesome/free-brands-svg-icons',
//         '@fortawesome/free-regular-svg-icons',
//         '@fortawesome/free-solid-svg-icons'
//     ]);
if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
	mix.version();
}
