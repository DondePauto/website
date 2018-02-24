/* global $ */
import PerfectScrollbar from 'perfect-scrollbar';

export default {
    init() {
        /**
         * Set the minimum height for the main content and initialize Perfect Scrollbar
         */
        var ps; $(function() {
            $(window).resize(function() {
                var min_height = $(window).height() - $('footer').height() - parseInt($('.main').css('top'), 10);
                $('.main>.content').css('minHeight', (min_height - (parseInt($(window).width(), 10)<576 ? 10 : 0))+'px');

                if( ps ) ps.destroy();
                ps = new PerfectScrollbar('.main', {suppressScrollX: true}); ps.update();
            }).resize();
        });

        /**
         * Enables navbar collapse from the left side
         */
        $(function() {
            // Enable collapse events when button or backdrop are clicked
            $('.navbar-toggler, .navbar-backdrop').click(function() {
                $('header').attr('temporal-toggle', $('header').attr('toggle'));
                $('header').attr('toggle', 'true');
            });

            // Handle navigation bar toggle collapse events
            $('header [data-toggle=collapse]').click(function() {
                var STEP = function( current, animation ) {
                    var expanded = $('.navbar-toggler').attr('aria-expanded');
                    var limit = expanded==='true' ? animation.end : animation.start;
                    $('.navbar-toggler, .navbar-brand, .main').css('left', (current-limit) + animation.unit);
                    $('.navbar-backdrop').css('opacity', Math.abs((current-limit)/limit));
                };
                var COMPLETE = function() {
                    var expanded = $('.navbar-toggler').attr('aria-expanded');
                    $('.navbar-toggler').attr('aria-expanded', expanded==='false' ? 'true' : 'false');
                    if( expanded==='true' ) {
                        $('header').attr('toggle', 'false');
                        $('header').removeAttr('temporal-toggle');
                        $('.navbar-backdrop').css('display', 'none');
                        ps = new PerfectScrollbar('.main', {suppressScrollX: true}); ps.update();
                    }
                };
                if( $('header').attr('toggle')==='true' ) {
                    var expanded = $('.navbar-toggler').attr('aria-expanded');
                    var toLeft   = expanded==='true' ? ('-'+$('.navbar-collapse').width()+'px') : '0px';
                    if( expanded==='false' ) {
                        ps.destroy(); ps = null;
                        $('.main').css('position', 'relative');
                        $('.navbar-backdrop').css('display', 'block');
                    }
                    $('.navbar-collapse').animate({left: toLeft}, {duration: 500, step: STEP, complete: COMPLETE});
                }
            });
        });
    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
    },
};
