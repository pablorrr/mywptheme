<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <?php dynamic_sidebar('footer-1'); ?>
        </div>
        <div class="col-sm-12 col-md-4">
            <?php dynamic_sidebar('footer-2'); ?>
        </div>
        <div class="col-sm-12 col-md-4">
            <?php dynamic_sidebar('footer-3'); ?>
        </div>
    </div>
    <hr>
    <!-- login, search - row -->
    <div class="row">
    <div style="" class="col-sm-12 col-md-4">
                <?php if (function_exists('wp_tag_cloud')) :
                    $args = array('public' => true, '_builtin' => false);
                    $taxonomies = get_taxonomies($args);
                    if (isset ($taxonomies)) {
                        $taxonomies = array_values($taxonomies);
                    }
                    $first_tax = !empty($taxonomies[0]) ? $taxonomies[0] : 'category';
                    $second_tax = !empty($taxonomies[1]) ? $taxonomies[1] : 'post_tag'; ?>

                    <h2><?php _e('Popular tags and categories', 'mywptheme'); ?></h2>
                    <h5><?php _e('Categories', 'mywptheme'); ?></h5>
                    <ul class="list-group list-unstyled tagcloud">
                        <li class="list-group-item">
                            <?php //display Wordpress Tag Cloud
                            wp_tag_cloud(array(
                                'smallest' => 13,
                                'largest' => 26,
                                'unit' => 'pt',
                                'number' => 45,
                                'format' => 'flat',
                                'separator' => "\n",
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'exclude' => '',
                                'include' => '',
                                'link' => 'view',
                                'taxonomy' => $first_tax,
                            )); ?>
                        </li>
                    </ul>
                    <h5><?php _e('Tags', 'mywptheme'); ?></h5>
                    <ul class="list-group list-unstyled tagcloud">
                        <li class="list-group-item">
                            <?php wp_tag_cloud(array(
                                'smallest' => 13,
                                'largest' => 20,
                                'unit' => 'pt',
                                'number' => 45,
                                'format' => 'flat',
                                'separator' => "\n",
                                'orderby' => 'name',
                                'order' => 'DESC',
                                'exclude' => '',
                                'include' => '',
                                'link' => 'view',
                                'taxonomy' => $second_tax,
                            ));
                            ?>
                        </li>
                    </ul>
                <?php endif; ?>
            </div><!-- .col-md-4 -->

        <div style="color:black;"  class="col-sm-12 col-md-4">
            <?php get_search_form(); ?>
        </div>
        <div class="col-sm-12 col-md-4">
            <?php if (((!is_user_logged_in()) && (is_front_page())) || ((!is_user_logged_in()) && (is_single()))): ?>
                <h5><a href="<?php echo wp_login_url(home_url()); ?>" title="Login">
                        <?php _e('Log in', 'mywptheme'); ?></a></h5>
            <?php else: ?>
                <ul class="list-inline">
                    <li>
                        <h5>
                            <a href="<?php echo wp_logout_url(); ?>"><?php _e('Log out', 'mywptheme'); ?></a>
                        </h5>
                    </li>
                    <li>
                        <h5><a target="_blank" href="<?php echo admin_url(); ?>" title="Admin">
                                <?php _e('Go to admin panel here', 'mywptheme'); ?></a>
                        </h5>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>

</footer>
</body>
</html>
