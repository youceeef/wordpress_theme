<?php

/**
 * Template part for displaying the main banner section.
 */

// Get the ACF fields
$background_img_url = get_field('banner_background_image');
$subtitle = get_field('banner_subtitle');
$heading = get_field('banner_heading');
?>

<section>
    <div class="container">
        <div class="banner rounded-4 p-5"
            style="background-image: url('<?php echo esc_url($background_img_url); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center;">

            <div class="text-content text-white py-5 my-5">
                <?php if ($subtitle) : ?>
                    <p class="fs-4"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>

                <?php if ($heading) : ?>
                    <h1 class="display-1"><?php echo nl2br(esc_html($heading)); ?></h1>
                <?php endif; ?>
            </div>

            <?php if (have_rows('banner_statistics')) : ?>
                <div class="row text-uppercase bg-black rounded-4 p-3 mt-5">

                    <?php while (have_rows('banner_statistics')) : the_row();
                        $stat_number = get_sub_field('stat_number');
                        $stat_description = get_sub_field('stat_description');
                    ?>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center gap-4">
                                <h2 class="display-2 text-light">
                                    <?php echo esc_html($stat_number); ?>
                                </h2>
                                <p class="text-light-emphasis justify-content-center m-0 ls-4">
                                    <?php echo nl2br(esc_html($stat_description)); ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
</section>