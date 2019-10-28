
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




        var $nav = $('nav.greedy');
        var $btn = $('nav.greedy button');
        var $vlinks = $('nav.greedy .links');
        var $hlinks = $('nav.greedy .hidden-links');

        var numOfItems = 0;
        var totalSpace = 0;
        var breakWidths = [];

        // Get initial state
        $vlinks.children().outerWidth(function(i, w) {
            totalSpace += w;
            numOfItems += 1;
            breakWidths.push(totalSpace);
        });

        var availableSpace, numOfVisibleItems, requiredSpace;

        function check() {

            // Get instant state
            availableSpace = $vlinks.width() - 10;
            numOfVisibleItems = $vlinks.children().length;
            requiredSpace = breakWidths[numOfVisibleItems - 1];

            // There is not enough space
            if (requiredSpace > availableSpace) {
                $vlinks.children().last().prependTo($hlinks);
                numOfVisibleItems -= 1;
                check();
                // There is more than enough space
            } else if (availableSpace > breakWidths[numOfVisibleItems]) {
                $hlinks.children().first().appendTo($vlinks);
                numOfVisibleItems += 1;
            }
            // Update the button accordingly
            $btn.attr("count", numOfItems - numOfVisibleItems);
            if (numOfVisibleItems === numOfItems) {
                $btn.addClass('hidden');
            } else $btn.removeClass('hidden');
        }

        // Window listeners
        $(window).resize(function() {
            check();
        });

        $btn.on('click', function() {
            $hlinks.toggleClass('hidden');
        });

        check();


    };

    // Initialize each block on page load (front end).
    $(document).ready(function(){

        $('.greedy').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=block-link-bar', initializeBlock );
    }

})(jQuery);