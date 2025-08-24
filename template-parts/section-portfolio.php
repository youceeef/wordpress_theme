<?php

/**
 * Template part for displaying the portfolio section.
 */
?>
<section class="portfolio py-5">
    <div class="container">
        <div class="justify-content-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-header text-center">
                        <h4 class="fw-bold fs-2 txt-fx slide-up">
                            As a passionate life coach and entrepreneur, I'm dedicated to guiding you on your journey to success and fulfillment.
                        </h4>
                    </div>
                </div>

                <?php
                // Get all the portfolio categories
                $terms = get_terms(array(
                    'taxonomy'   => 'portfolio_category',
                    'hide_empty' => true,
                ));

                if (! empty($terms) && ! is_wp_error($terms)) :
                ?>
                    <div id="filters" class="button-group d-flex flex-wrap gap-3 justify-content-center py-5">
                        <a href="#" class="btn btn-primary text-decoration-none text-uppercase is-checked" data-filter="*">All</a>
                        <?php foreach ($terms as $term) : ?>
                            <a href="#" class="btn btn-primary text-decoration-none text-uppercase" data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php
            // WP_Query arguments to get all portfolio items
            $args = array(
                'post_type'      => 'portfolio',
                'posts_per_page' => -1, // Get all posts
            );
            $portfolio_query = new WP_Query($args);

            if ($portfolio_query->have_posts()) :
            ?>
                <div class="grid p-0 clearfix row row-cols-2 row-cols-lg-3 row-cols-xl-4">
                    <?php
                    while ($portfolio_query->have_posts()) : $portfolio_query->the_post();

                        $portfolio_img_url = get_field('portfolio_image');
                        $item_terms = get_the_terms(get_the_ID(), 'portfolio_category');
                        $term_slugs = '';
                        if (! empty($item_terms)) {
                            $term_slugs = implode(' ', wp_list_pluck($item_terms, 'slug'));
                        }
                    ?>
                        <div class="col mb-4 portfolio-item <?php echo esc_attr($term_slugs); ?>">
                            <a href="<?php echo esc_url($portfolio_img_url); ?>" data-lightbox="<?php the_ID(); ?>" data-title="<?php the_title(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo esc_url($portfolio_img_url); ?>" class="img-fluid rounded-4" alt="<?php the_title(); ?>">
                            </a>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata(); // Important: reset the post data after the loop
                    ?>
                </div>
            <?php endif; ?>

            <div class="text-center p-3">
                <a href="#" class="btn btn-outline-dark btn-lg mt-3 text-uppercase text-decoration-none">
                    View All Works
                </a>
            </div>
        </div>
    </div>
</section>