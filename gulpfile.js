var elixir = require('laravel-elixir');

require('laravel-elixir-imagemin');

config.assetsPath = './content/themes/easier-english-bg-theme';

elixir(function(mix) {
    mix
    /**
     * Compile the main .scss file to .css
     * During the compilation elixir AutoPrefixes the css
     * http://laravel.com/docs/5.1/elixir#sass
     */
    .sass('style.scss', 'content/themes/easier-english-bg-theme/css/style.css')
    .sass('text-to-speech.scss', 'content/themes/easier-english-bg-theme/css/text-to-speech.min.css')
    /**
     * Combine the css files into a single file
     * http://laravel.com/docs/5.1/elixir#plain-css
     */
    .styles([
        '../../../lib/normalize-css/normalize.css',
        'style.css'
    ], 'content/themes/easier-english-bg-theme/css/style.min.css')

    /**
     * Combine the js files into a single file
     * http://laravel.com/docs/5.1/elixir#javascript
     */
    .scripts([
        'jquery.mmenu.min.js',
        '../../../plugins/mailchimp/js/jquery.form.min.js',

        // JS responsible for the TTS integration
        'text-to-speech.js',

        'script.js'
    ], 'content/themes/easier-english-bg-theme/js/script.min.js')
    /**
     * Minify images with ImageMin: https://github.com/imagemin/imagemin
     *  - gifsicle — Compress GIF images
     *  - jpegtran — Compress JPEG images
     *  - optipng — Compress PNG images
     *  - svgo — Compress SVG images
     * Use a Laravel Elixir wrapper for ImageMin
     * https://github.com/nathanmac/laravel-elixir-imagemin
     */
    .imagemin(
        './content/themes/easier-english-bg-theme/img-uncompressed',
        './content/themes/easier-english-bg-theme/img',
        { optimizationLevel: 3, progressive: true, interlaced: true }
    );
});
