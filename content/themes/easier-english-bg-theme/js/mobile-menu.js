(function() {
    window.EasierEnglish = window.EasierEnglish || {};

    EasierEnglish.MobileMenu = function(){
        var self = this;

        /**
         * Helper function which builds mobile menu html
         * by extracting the anchor tags from the main Wordpress menu
         * and parsing them in the jQuery mmenu required html format
         */
        function buildMobileMenuHtml(){
            // Get all main menu elements + lesson categories
            $mainMenu = $('#menu-default-menu');
            $mainMenuLiElements = $mainMenu.find('> li').not('.menu-item-has-children');
            $allLessonsCategoriesLiElement = $mainMenu.find('.menu-item-has-children').find('li');

            // Start building mobile nav html
            var mobileNavHtml = '<nav id="mobile_menu"><ul>';
            // Fill all main menu anchor tags first
            $mainMenuLiElements.each(function(index, el){
                mobileNavHtml += '<li>' + $(el).html() + '</li>';
            });
            // Then - fill lessons categories here
            mobileNavHtml += '<li><a id="fore-mobile-menu-lesson-categories" href="javascript:;">Уроци по категории</a><ul id="mobile_categories_submenu">';
            $allLessonsCategoriesLiElement.each(function(index, el){
                mobileNavHtml += '<li>' + $(el).html() + '</li>';
            });
            mobileNavHtml += '</ul></li>';

            // Add search field
            mobileNavHtml += '<li><form role="search" method="get" class="searchform" action="http://easierenglish.bg/"><input type="text" value="" name="s" id="s" placeholder="Потърси урок..."></form></li>';

            mobileNavHtml += '</ul></nav>';

            return mobileNavHtml;
        }

        /**
         * Init the jQuery mmenu v4.1.7
         * https://github.com/FrDH/jQuery.mmenu
         */
        self.init = function(){
            // Build & append the html required
            var mobileNavHtml = buildMobileMenuHtml();
            $('body').append(mobileNavHtml);

            // Init jQuery mmenu
            $('#mobile_menu').mmenu();

            // Append the mobile hamburger button & attach custom button's click events
            var $pageHeader = $('#masthead');
            $pageHeader.append('<a id="fire-mobile-menu" class="mobile_menu_button" href="javascript:;"><div class="mobile_menu_icon"></div></a>');

            $(document).on('click', '#fire-mobile-menu', function(){
                $('#mobile_menu').trigger('open');
            })
            .on('click', '#fore-mobile-menu-lesson-categories', function(){
                $('#mobile_categories_submenu').trigger('open');
            });

            // Fix: header jump
            $.fn.moveTo = function(selector){
                return this.each(function(){
                    var cl = $(this).clone();
                    $(cl).prependTo(selector);
                    $(this).remove();
                });
            };
            $pageHeader.moveTo('.mm-page');
        };

        /**
         * Attach the init event on window resize,
         * if the screen is < 800px width - init the mobile menu.
         * Finally - turn of the resize event.
         * Once when you init the mobile menu - don't destroy it,
         * just keep it there - it will ve visible on mobile only (css media queries),
         * on bigger screens - will be invisible, but there.
         */
        var resizeTimeout = null;
        $(window).on('resize', function() {
            // Use resize-timeout JS pattern
            if (resizeTimeout) {
                clearTimeout(resizeTimeout);
                resizeTimeout = null;
            }

            resizeTimeout = setTimeout(function(){
                if ($(window).width() < 800) {
                    self.init();
                    $(window).off('resize');
                }
            }, 300);
        }).trigger('resize');
    };
})();
