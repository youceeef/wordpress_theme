<?php

/**
 * Template part for displaying the info columns (Education, Experience, etc.).
 */
?>
<section class="py-5">
    <div class="container">
        <div class="row">

            <?php if (have_rows('info_columns')) : ?>
                <?php
                // To assign different background colors to the columns
                $bg_colors = array('bg-yellow', 'bg-green', 'bg-teal');
                $color_index = 0;
                ?>
                <?php while (have_rows('info_columns')) : the_row();
                    $column_title = get_sub_field('column_title');
                    $bg_class = $bg_colors[$color_index % count($bg_colors)]; // Cycle through colors
                ?>
                    <div class="col-lg-4">
                        <div class="h-100 <?php echo $bg_class; ?> p-4 rounded-4">
                            <?php if ($column_title) : ?>
                                <h3><?php echo esc_html($column_title); ?></h3>
                            <?php endif; ?>

                            <?php if (have_rows('column_items')) : ?>
                                <?php while (have_rows('column_items')) : the_row();
                                    $date_range = get_sub_field('item_date_range');
                                    $heading = get_sub_field('item_heading');
                                    $description = get_sub_field('item_description');
                                ?>
                                    <div class="py-4">
                                        <?php if ($date_range) : ?>
                                            <p class="text-dark-emphasis"><?php echo esc_html($date_range); ?></p>
                                        <?php endif; ?>

                                        <?php if ($heading) : ?>
                                            <h5><?php echo esc_html($heading); ?></h5>
                                        <?php endif; ?>

                                        <?php if ($description) : ?>
                                            <p class="text-dark-emphasis"><?php echo esc_html($description); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                    $color_index++; // Increment for the next column's color
                endwhile;
                ?>
            <?php endif; ?>

        </div>
    </div>
</section>