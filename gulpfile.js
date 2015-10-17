var elixir = require('laravel-elixir');

config.assetsPath = './content/themes/easier-english-bg-theme';

elixir(function(mix) {
    mix
    .styles([
            '../../../lib/normalize-css/normalize.css',
            'style.css'
        ], 'content/themes/easier-english-bg-theme/css/style.min.css');
});
