<?php
/**
 * The template for displaying category
 * @link https://codex.wordpress.org/Taxonomies
 * @package mywpheme
 *
 */
get_header();
?>
    <section id="primary">
        <div class="container">
            <div class="row mar-top-20">
                <div class="col-md-12">
                    <h4 style="color:black"><?php _e('Category page', 'mywptheme'); ?></h4>
                    <h5 style="color:black"><?php echo single_cat_title(); ?></h5>
                   <p style="color:black"> <?php echo category_description(); ?></p>

                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', get_post_format()); ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <h2 style="padding:100px;color:black">
                                <?php _e('Sorry, there are no posts in this category', 'mywptheme'); ?></h2>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!--.container-->
    </section><!--#primary -->
    <div class="row mar-bot-30"></div>
<?php get_footer();
