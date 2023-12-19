<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/
 *
 * @package mywptheme
 *
 */
get_header();?>
<h1 style="color: red;">single.php</h1>
    <div id="content" class="container">
        <div class="row mx-auto m-single">
            <section id="primary" class="content-area col-sm-12 col-md-8 col-lg-8">
                <main id="main" class="site-main" role="main">
                    <!-- loop start -->
                    <?php while (have_posts()): the_post(); ?>
                      <?php get_template_part('template-parts/content');?>
                      <?php if (is_single() && comments_open()): ?>
                        <?php  comments_template('', true);?>
                     <?php endif;?>
                    <?php endwhile ; ?>
                </main><!--#main-->
            </section><!--#primary-->
          
        </div><!--.row .mx-auto .m-single -->
    </div><!--.container-->
<?php get_footer(); ?>
