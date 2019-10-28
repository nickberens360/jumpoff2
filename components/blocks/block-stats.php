<!-- components/blocks/block-stats.php -->


<div class="block block-stats">
    <div class="block__inner">
        <div class="block-stats__row">
            <div class="block-stats__row-item block-stats__row-left">
                <h2 class="block__heading"><?php the_field('stat_block_headline') ?></h2>
            </div>
            <div class="block-stats__row-item block-stats__row-right">

                <div class="nunBoxRow">

                    <?php if( have_rows('stat_boxes') ): ?>
                        <?php  while ( have_rows('stat_boxes') ) : the_row();
                            $link = get_sub_field('stat_link');
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>

                            <div class="numBoxRow__item">
                                <div class="numBox">
                                    <h3 class="numBox__num"><?php the_sub_field('stat_number') ?></h3>
                                    <h4 class="numBox__title"><?php the_sub_field('stat_title') ?></h4>
                                    <p class="numBox__content"><?php the_sub_field('stat_content') ?></p>
                                    <a class="numBox__link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>


                </div>

            </div>
        </div>
    </div>
</div>