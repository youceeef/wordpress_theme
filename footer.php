<footer id="footer" class="bg-black text-white py-5">
    <div class="container-sm">
        <div class="row g-md-5 my-5">
            <div class="col-md-4">
                <div class="info-box">

                    <?php
                    // Use the Footer Logo field from Theme Settings
                    $footer_logo = get_field('footer_logo', 'option');
                    if ($footer_logo) :
                    ?>
                        <img src="<?php echo esc_url($footer_logo); ?>" class="img-fluid">
                    <?php else: // Fallback to the default image if no logo is set 
                    ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-2.png" class="img-fluid">
                    <?php endif; ?>

                    <?php if (get_field('footer_description', 'option')) : ?>
                        <p class="py-4"><?php the_field('footer_description', 'option'); ?></p>
                    <?php endif; ?>

                    <div class="social-links">
                        <?php // Reuse the same social icons repeater from the header 
                        ?>
                        <?php if (have_rows('social_icons', 'option')): ?>
                            <?php while (have_rows('social_icons', 'option')) : the_row();
                                $svg_id = get_sub_field('icon_svg_id');
                                $link = get_sub_field('social_link');
                            ?>
                                <a href="<?php echo esc_url($link); ?>" class="text-decoration-none text-white">
                                    <svg class="<?php echo esc_attr($svg_id); ?>" width="24" height="24">
                                        <use xlink:href="#<?php echo esc_attr($svg_id); ?>"></use>
                                    </svg>
                                </a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'container'      => false,
                                'menu_class'     => 'list-unstyled',
                                'add_link_class' => 'text-decoration-none text-white' // <-- ADD THIS LINE
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <?php if (get_field('footer_contact_text', 'option')) : ?>
                    <p><?php the_field('footer_contact_text', 'option'); ?></p>
                <?php endif; ?>

                <?php
                $email = get_field('footer_contact_email', 'option');
                if ($email) :
                ?>
                    <h3>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="text-white text-decoration-none"><?php echo esc_html($email); ?></a>
                    </h3>
                <?php endif; ?>
            </div>
        </div>
        <!-- <div class="row">
            <p>©<?php echo date('Y'); ?> Youssef Kaabechi<a href="https://templatesjungle.com/" class="text-white" target="_blank">youcefkaabechi.com</a>. Distributed By <a href="https://themewagon.com" class="text-white" target="blamk">ThemeWagon</a> </p>
        </div> -->
    </div>
</footer>

<?php
// This single WordPress function replaces all the old, hard-coded <script> tags.
wp_footer();
?>

</body>

</html>