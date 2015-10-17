var elixir = require('laravel-elixir');

config.assetsPath = './content/themes/easier-english-bg-theme';

elixir(function(mix) {
    mix
    .styles([
            '../../../lib/normalize-css/normalize.css',
            'style.css'
        ], 'content/themes/easier-english-bg-theme/css/style.min.css')
    .scripts([
            'jquery.mmenu.min.js',
            '../../../plugins/mailchimp/js/jquery.form.min.js',
            'jquery.say.js',

            'script.js'
        ], 'content/themes/easier-english-bg-theme/js/script.min.js');
});
