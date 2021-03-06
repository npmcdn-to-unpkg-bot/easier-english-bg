(function() {
    window.EEApp = window.EEApp || {};

    /**
     * Helper function with triggers the text to speech
     * for the English words and phrases.
     * Done via the Speech Synthesis API
     * https://developers.google.com/web/updates/2014/01/Web-apps-that-talk-Introduction-to-the-Speech-Synthesis-API?hl=en
     */
    EEApp.TextToSpeech = {
        /**
         * Start by Feature detection
         * to make sure the browser supports it.
         *
         * Attach the event to all elements
         * with a data attribute: data-say.
         *
         * Get the styles in css/text-to-speech.css
         * and attach them in the document head
         * if the Speech Synthesis API is available
         */
        init: function(){
            if ('speechSynthesis' in window) {
                var msg = new SpeechSynthesisUtterance();
                msg.voiceURI = 'native';
                msg.lang = 'en-US';

                // Attach event
                $('[data-say]').on('click', function(){
                    msg.text = $(this).text().trim();
                    speechSynthesis.speak(msg);
                });

                // Attach styles
                var ttsStylesLocation = "/content/themes/easier-english-bg-theme/css/text-to-speech.min.css";
                $.get(ttsStylesLocation, function(data){
                    $('<style>' + data + '</style>').appendTo('head');
                });
            }
        }
    };
})();
