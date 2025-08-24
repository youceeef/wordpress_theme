<?php

/**
 * Template part for displaying the FAQs section.
 */
$faq_image_url = get_field('faq_image');
$faq_title     = get_field('faq_title');
?>
<section>
    <div class="container">
        <?php if ($faq_title) : ?>
            <div class="text-center pt-5">
                <h2 class="display-3"><?php echo esc_html($faq_title); ?></h2>
            </div>
        <?php endif; ?>

        <div class="row mt-5">
            <div class="col-lg-6">
                <?php if ($faq_image_url) : ?>
                    <img src="<?php echo esc_url($faq_image_url); ?>" class="img-fluid">
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <?php if (have_rows('faq_items')) : ?>
                    <div class="accordion accordion-flush" id="accordion-flush">
                        <?php
                        $counter = 1; // Initialize a counter for unique IDs
                        while (have_rows('faq_items')) : the_row();
                            $question = get_sub_field('question');
                            $answer   = get_sub_field('answer');
                            // Create unique IDs for the accordion controls
                            $collapse_id = 'collapse-' . $counter;
                        ?>
                            <div class="accordion-item border mb-3 rounded-3">
                                <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" style="font-weight:bold;" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                        <?php echo esc_html($question); ?>
                                    </button>
                                </h5>
                                <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse" data-bs-parent="#accordion-flush">
                                    <div class="accordion-body">
                                        <p><?php echo esc_html($answer); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $counter++; // Increment the counter
                        endwhile;
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>