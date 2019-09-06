let mix = require('laravel-mix');

var assetsDir = 'resources/assets/';

mix.scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/admin-lte/dist/js/adminlte.js',
        'node_modules/axios/dist/axios.min.js',
        'node_modules/icheck/icheck.min.js',

        'node_modules/nprogress/nprogress.js',
        'node_modules/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js',
        'node_modules/sweetalert2/dist/sweetalert2.min.js',
        'node_modules/select2/dist/js/select2.min.js',
        'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'node_modules/trumbowyg/dist/trumbowyg.min.js',
        'node_modules/toastr/build/toastr.min.js',

        // datatables
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
        'node_modules/datatables.net-fixedheader/js/dataTables.fixedHeader.js',
        'node_modules/datatables.net-responsive/js/dataTables.responsive.js',
        'node_modules/datatables.net-responsive-bs/js/responsive.bootstrap.js',
         assetsDir + 'vendor/dataTables.checkboxes.min.js',


        // ui initialize
        assetsDir + 'js/init.js',

        assetsDir + 'js/jquery.ajaxify.js'


    ], 'public/js/all.js')

    .styles([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'node_modules/font-awesome/css/font-awesome.min.css',
        'node_modules/ionicons/dist/css/ionicons.min.css',
        'node_modules/select2/dist/css/select2.min.css',
        'node_modules/admin-lte/dist/css/AdminLTE.min.css',
        'node_modules/admin-lte/dist/css/skins/skin-blue.min.css',

        'node_modules/icheck/skins/square/blue.css',
        // datatables
        'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
        'node_modules/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.css',
        'node_modules/datatables.net-responsive-bs/css/responsive.bootstrap.css',


         assetsDir + 'vendor/dataTables.checkboxes.css',
        'node_modules/nprogress/nprogress.css',
        'node_modules/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css',
        'node_modules/sweetalert2/dist/sweetalert2.min.css',
        'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'node_modules/trumbowyg/dist/ui/trumbowyg.min.css',
        'node_modules/toastr/build/toastr.min.css',

        // custom styles
        assetsDir + 'css/helpers.css',
        assetsDir + 'css/overrides.css',
        assetsDir + 'css/confirm-modal.css',
        assetsDir + 'css/adminlte.css'
    ], 'public/css/all.css')

    .copy('node_modules/font-awesome/fonts/FontAwesome.otf', 'public/fonts/FontAwesome.otf')
    .copy('node_modules/font-awesome/fonts/fontawesome-webfont.woff', 'public/fonts/fontawesome-webfont.woff')
    .copy('node_modules/ionicons/dist/fonts/ionicons.woff', 'public/fonts/ionicons.woff')
    .copy('node_modules/ionicons/dist/fonts/ionicons.woff2', 'public/fonts/ionicons.woff2')
    .copy('node_modules/ionicons/dist/fonts/ionicons.ttf', 'public/fonts/ionicons.ttf')
    .copy('node_modules/ionicons/dist/fonts/ionicons.svg', 'public/fonts/ionicons.svg')
    .copy('node_modules/ionicons/dist/fonts/ionicons.eot', 'public/fonts/ionicons.eot')
    .copy('node_modules/icheck/skins/square/blue.png', 'public/css/blue.png');
