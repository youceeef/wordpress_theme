<?php

/**
 * Template part for displaying the testimonials section.
 */
?>
<section>
    <div class="container">
        <div class="text-center">
            <h2 class="display-3 mb-5">Testimonials</h2>
        </div>

        <?php if (have_rows('testimonials')) : ?>
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">

                    <?php while (have_rows('testimonials')) : the_row();
                        $content = get_sub_field('testimonial_content');
                        $author  = get_sub_field('author_name');
                        $date    = get_sub_field('date');
                    ?>
                        <div class="testimonial-card rounded-3 py-4 px-4 swiper-slide">
                            <div class="text-start">
                                <?php if ($content) : ?>
                                    <p>"<?php echo esc_html($content); ?>"</p>
                                <?php endif; ?>

                                <?php if ($author) : ?>
                                    <h5><?php echo esc_html($author); ?></h5>
                                <?php endif; ?>

                                <?php if ($date) : ?>
                                    <p class="postd"><?php echo esc_html($date); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
                <div class="testimonial-swiper-pagination position-relative mt-5 text-center"></div>
            </div>
        <?php endif; ?>

    </div>
</section>