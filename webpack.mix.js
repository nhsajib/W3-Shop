const mix = require('laravel-mix');

mix.js([
    'resources/js/admin/admin.js',
    'resources/js/admin/prefect-scrollbar.js',
    'resources/js/admin/off-canvas.js',
    'resources/js/admin/hoverable-collapse.js',
    'resources/js/admin/template.js',
], 'public/js/admin.js')
    .vue()

mix.styles([
        'resources/css/admin/vendor.bundle.base.css',
        // 'resources/css/admin/style.css',
    ], 'public/css/admin.css')


mix.styles([
    'resources/css/shop/material-design-iconic-font.min.css',
    'resources/css/shop/font-awesome.min.css',
    'resources/css/shop/fontawesome-stars.css',
    'resources/css/shop/meanmenu.css',
    'resources/css/shop/owl.carousel.min.css',
    'resources/css/shop/slick.css',
    'resources/css/shop/animate.css',
    'resources/css/shop/jquery-ui.min.css',
    'resources/css/shop/venobox.css',
    'resources/css/shop/nice-select.css',
    'resources/css/shop/magnific-popup.css',
    'resources/css/shop/bootstrap.min.css',
    'resources/css/shop/helper.css',
    'resources/css/shop/style.css',
    'resources/css/shop/responsive.css',
], 'public/css/shop.css')


mix.js([
    'resources/js/shop/main.js',
], 'public/js/shop.js')

// mix.browserSync('http://127.0.0.1:8000');

if (mix.inProduction()) {
    mix.version();
}

