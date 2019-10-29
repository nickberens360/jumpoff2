<?php
get_header();
query_global_ui(
    array(
        'post_type' => 'global_ui',
        'name' => 'blog-index-banner',
    )
);
?>
    <nav class="greedy">
        <ul class="block-linkBar links">
            <?php if (is_home()) {
                echo '<li class="current-cat"><a href="/blog">All</a></li>';
            } else {
                echo '<li><a href="/blog">All</a></li>';
            }
            ?>
            <?php
            $categories = wp_list_categories(array(
                'title_li' => '',
                'hide_empty' => 1
            ));
            ?>
        </ul>
        <button>MORE</button>
        <ul class='hidden-links hidden'></ul>
    </nav>
    <div class="contentWrap">
        <div class="contentWrap__inner">
            <?php
            $term = get_queried_object();
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'order' => 'DESC',
                'category_name' => $term->slug
            );
            $query = new WP_Query($args);
            ?>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post() ?>
                    <div class="postBox postBox-featured">
                        <div class="postBox__left postBox__item text-center">


                            <?php if (get_field('video')) { ?>
                                <div class="wp-block-embed__wrapper">
                                    <?php the_field('video') ?>
                                </div>
                            <?php } else {
                                the_post_thumbnail('medium');
                            } ?>

                        </div>
                        <div class="postBox__right postBox__item">
                            <h4 class="h4">Featured</h4>
                            <h2 class="headingLine headingLine-sml"><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                <?php endwhile ?>
            <?php endif ?>
            <?php wp_reset_postdata(); ?>
            <?php
            $args = array(
                'post_type' => 'post',
                'offset' => 1,
                'order' => 'DESC',
                'category_name' => $term->slug
            );
            $query = new WP_Query($args);
            ?>
            <?php if ($query->have_posts()) : ?>
                <h4 class="h4">More</h4>
                <div class="postBoxGroup">
                    <?php while ($query->have_posts()) : $query->the_post() ?>

                        <div class="postBox">
                            <div class="postBox__vidImg">
                                <?php if (get_field('video')) { ?>
                                    <img src="https://img.youtube.com/vi/<?= get_video_id('video') ?>/hqdefault.jpg" alt="">
                                <?php } else {
                                    the_post_thumbnail('medium');
                                } ?>
                            </div>

                            <div class="postBox__content">
                                <h2 class="postBox__title"><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </div>

                    <?php endwhile ?>
                </div>

            <?php endif ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>

<?php
get_footer();
?>
<script type="text/javascript" src="<?= TEMPLATE_URI .'/template-parts/blocks/block-link-bar/block-link-bar.js' ?> "></script>
