// Import components.

require('bootstrap');
//import Example from './example.js';

// Initialize your components on DOM Ready.
jQuery( document ).ready(function( $ ) {

    /*Example.init({
        el: 'New setting'
    });*/


    $('.downArrow').on('click', function(e) {
        e.preventDefault();

        $('html, body').animate(
            {
                scrollTop: $($(this).attr('href')).offset().top,
            },
            500,
            'linear'
        )
    });

    /*$('.block-core').wrapAll( "<div class='block-core-group' />");*/

    if($('[data-position="fixed-absolute"]').length) {
        $('body').addClass('has-fixed-header');
    }



    $('body').on('click', '.globalBox .acf-button', function(e) {
        e.preventDefault();
        $('.globalBox .acf-button').submit();
    });

    $(".globalBox").find('.acf-true-false input').change(function() {
        $(".globalBox").find('.acf-true-false input').prop('checked', false);
        $(this).prop('checked', true);
    });





});

