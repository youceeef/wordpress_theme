<?php

/**
 * Template part for displaying the references section.
 */
$bg_img_url = get_field('references_background_image');
$title      = get_field('references_title');
?>

<section class="py-5">
    <div class="container">
        <div class="rounded-4 p-5" style="background-image: url('<?php echo esc_url($bg_img_url); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center;">
            <div class="row">
                <div class="col-md-4">
                    <div class="h-100 bg-black text-white p-4 rounded-4">

                        <?php if ($title) : ?>
                            <h3><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if (have_rows('reference_items')) : ?>
                            <?php while (have_rows('reference_items')) : the_row();
                                $date_range  = get_sub_field('ref_date_range');
                                $name        = get_sub_field('ref_name');
                                $description = get_sub_field('ref_description');
                            ?>
                                <div class="py-4">
                                    <?php if ($date_range) : ?>
                                        <p class="text-light-emphasis"><?php echo esc_html($date_range); ?></p>
                                    <?php endif; ?>

                                    <?php if ($name) : ?>
                                        <h5><?php echo esc_html($name); ?></h5>
                                    <?php endif; ?>

                                    <?php if ($description) : ?>
                                        <p class="text-light-emphasis"><?php echo esc_html($description); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>