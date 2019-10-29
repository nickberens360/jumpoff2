<!-- components/blocks/block-mailchimp.php -->


<?php

$name = "block-mailchimp";

$id = $name.'-'. $block['id'];
$className = $name;
?>


<?php include TEMPLATE_PATH.'/block-parts/opening.php'; ?>
        <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-311" method="post" data-id="311" data-name="Mailchimp Signup Form">
            <div class="mc4wp-form-fields">
                <p>
                    <label>Email address:</label>
                    <input class="form-input" type="email" name="EMAIL" placeholder="Your email address" required="">
                </p>

                <p>
                    <input class="btns btns-1" type="submit" value="Sign up">
                </p></div>
            <label style="display: none !important;">Leave this field empty if you're human:
                <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off"></label><input type="hidden" name="_mc4wp_timestamp" value="1570463547"><input type="hidden" name="_mc4wp_form_id" value="311"><input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1">
            <div class="mc4wp-response"></div>
        </form>
<?php include TEMPLATE_PATH.'/block-parts/closing.php'; ?>

<?php include TEMPLATE_PATH.'/block-parts/settings.php'; ?>

