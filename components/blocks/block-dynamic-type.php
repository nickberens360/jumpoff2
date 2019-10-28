<!-- components/blocks/block-dynamic-type.php -->

<?php


$bgImg = get_field('background_image');
$useArrow = get_field('use_floating_arrow');
if ($useArrow) {
    $hasArrow = 'block-dynamic-type__logo-arrow';
} else {
    $hasArrow = '';
}

?>


<div class="block-dynamic-type">
    <div class="block-dynamic-type__content">
        <div><span class="typity"></span></div>
    </div>
    <div class="block-dynamic-type__logo <?= $hasArrow; ?>">
        <div><img src="<?php the_field('logo'); ?>"></div>
        <?php if ($useArrow) { ?>
            <a href="#block-anchor" class="downArrow">
                <i class="fas fa-arrow-down"></i>
            </a>
        <?php } ?>
    </div>
</div>
<div id="block-anchor"></div>


<style>
    .block-dynamic-type:after {
    <?= acf_build_style('overlay', 'background-color', false); ?>
    }
</style>


<script>

    var images = [
        <?php if( have_rows('background_images') ): ?>
        <?php  while ( have_rows('background_images') ) : the_row(); ?>

        '<?php the_sub_field('image') ?>',

        <?php endwhile; ?>
        <?php endif; ?>
    ];
    jQuery('.block-dynamic-type').css({'background-image': 'url(' + images[Math.floor(Math.random() * images.length)] + ')'});

    let typed = "";
    const element = document.querySelector(".typity");

    let stringIndex = 0;

    function startType(pun, index) {
        if (index < pun.length) {
            typed += pun.charAt(index);
            element.innerHTML = typed;
            index++;
            setTimeout(function () {
                startType(pun, index);
            }, 50);
        } else {
            setTimeout(function () {
                element.classList.add("highlight");
            }, 1000);

            setTimeout(function () {
                element.classList.remove("highlight");
                typed = "";
                element.innerHTML = typed;
                startType(getRandomPun(stringIndex), 0);
            }, 2000);
        }
    }

    function getRandomPun(i) {

        const puns = [
            <?php if( have_rows('dynamic_text') ): ?>
            <?php  while ( have_rows('dynamic_text') ) : the_row(); ?>

            '<?php the_sub_field('text') ?>',

            <?php endwhile; ?>
            <?php endif; ?>

        ];

        stringIndex++;
        if (stringIndex > puns.length - 1) {
            stringIndex = 0;
        }

        return puns[i];
    }

    startType(getRandomPun(stringIndex), 0);
</script>
