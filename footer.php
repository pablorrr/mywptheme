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

</footer>
</body>
</html>
