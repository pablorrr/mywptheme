<?php
/**
 * The template for displaying tag
 *
 * @link https://codex.wordpress.org/Taxonomies
 *
 * @package mywptheme
 *
 */
get_header();
?>
    <section id="primary">
        <div class="container">
            <div class="row mar-top-20">
                <div class="col-md-12">
                    <h4 style="color:black"><?php _e('Tag page', 'mywptheme'); ?></h4>
                    <h5 style="color:black"><?php echo single_tag_title(); ?></h5>
                    <?php if (!empty(tag_description())) : ?>
                        <?php echo tag_description(); ?>
                    <?php endif; ?>
                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', get_post_format()); ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <h2 style="padding:100px;color:black">
                                <?php _e('Sorry, there are no posts in this tag', 'mywptheme'); ?></h2>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!--.container-->
    </section><!--#primary -->
    <div class="row mar-bot-30"></div>
<?php get_footer();
