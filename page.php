<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mywptheme
 */
get_header();
?><div id="content" style="color:black"  class="container">
        <div class="row mx-auto m-single">

            <section id="primary" class="content-area col-sm-12 col-md-8 col-lg-8">
                <main id="main" class="site-main" role="main">
                <h1 style="color: red;">page.php</h1>
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <?php the_content();?>
                            </div><!-- .entry-content -->
                            <?php if (get_edit_post_link()) : ?>
                                <footer class="entry-footer">
                                    <?php
                                    edit_post_link(
                                        sprintf(
                                        /* translators: %s: Name of current post */
                                            esc_html__('Edit %s', 'mywptheme'),
                                            the_title('<span class="screen-reader-text">"', '"</span>', false)
                                        ),
                                        '<span class="edit-link">',
                                        '</span>'
                                    ); ?>
                                </footer><!-- .entry-footer -->
                            <?php endif; ?>
                        </article><!-- #post-## -->
                    <?php endwhile; ?>
                </main><!--#main-->
            </section><!--#primary-->

        </div><!--.row .mx-auto .m-single -->
    </div><!--.container-->
<?php
get_footer();
