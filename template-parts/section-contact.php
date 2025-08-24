<?php

/**
 * Template part for displaying the contact section.
 */
$subtitle    = get_field('contact_subtitle');
$title       = get_field('contact_title');
$description = get_field('contact_description');
$shortcode   = get_field('form_shortcode');
?>
<section class="p-5 bg-yellow py-5">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-5">
                <?php if ($subtitle) : ?>
                    <h6><?php echo esc_html($subtitle); ?></h6>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="display-3"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-5">
                <?php
                // Use do_shortcode to process and display the form from the plugin
                if ($shortcode) {
                    echo do_shortcode($shortcode);
                }
                ?>
            </div>
        </div>
    </div>
</section>