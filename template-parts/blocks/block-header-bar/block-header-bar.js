(function ($) {

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
    var initializeBlock = function ($block) {

        let $body = $('body');
        const $parentEl = $('.block-header-bar');

        $body.on('click', '.js-headerBar-trigger', function (e) {
            e.preventDefault();
                $parentEl.toggleClass('block-header-bar-open');

        });


        const $menu = $('.block-header-bar__nav');
        $(document).mouseup(e => {
            if (!$menu.is(e.target) && $menu.has(e.target).length === 0)
            {
                $parentEl.removeClass('block-header-bar-open');
            }
        });


    };

    // Initialize each block on page load (front end).
    $(document).ready(function () {
        $('.block-header-bar').each(function () {
            initializeBlock($(this));
        });
    });

    // Initialize dynamic block preview (editor).
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=block-togglenav', initializeBlock);
    }

})(jQuery);