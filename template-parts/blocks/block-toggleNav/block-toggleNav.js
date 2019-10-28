
(function($){

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function( $block ) {
        let $body = $('body');
        let $parentEl = $('.block-toggleNav');

        $body.on('click', '.js-toggleMenu-trigger', function(e) {
            e.preventDefault();
            if ($parentEl.hasClass('toggleNav-open')) {
                $parentEl.removeClass('toggleNav-open');
                $body.css('overflow', 'auto');
            }
            else {
                $parentEl.addClass('toggleNav-open');
                $body.css('overflow', 'hidden');
            }
        });

        const $menu = $('.toggleMenuWrap');

        $(document).mouseup(e => {
            if (!$menu.is(e.target) // if the target of the click isn't the container...
                && $menu.has(e.target).length === 0) // ... nor a descendant of the container
            {
                $parentEl.removeClass('toggleNav-open');
                $body.css('overflow', 'auto');
            }
        });


    };

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.block-toggleNav').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=block-togglenav', initializeBlock );
    }

})(jQuery);