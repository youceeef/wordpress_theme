<?php

/**
 * Template part for displaying the feature blocks section.
 */
?>

<section class="p-5">
    <div class="container">
        <div class="row justify-content-center">
            <?php if (have_rows('feature_items')) : ?>
                <?php while (have_rows('feature_items')) : the_row();
                    $icon_id = get_sub_field('icon_svg_id');
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                ?>
                    <div class="col-lg-3">
                        <div class="d-flex gap-4 align-items-start">
                            <div class="icon">
                                <svg class="text-primary <?php echo esc_attr($icon_id); ?>" width="50" height="50">
                                    <use xlink:href="#<?php echo esc_attr($icon_id); ?>"></use>
                                </svg>
                            </div>
                            <div class="text-md-start">
                                <?php if ($heading) : ?>
                                    <h5><?php echo esc_html($heading); ?></h5>
                                <?php endif; ?>
                                <?php if ($description) : ?>
                                    <p class="postf"><?php echo esc_html($description); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>