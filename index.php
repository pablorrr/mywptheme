<?php get_header(); ?>

<h1 style="color: red;">index.php</h1>


<!-- Second Container -->

<div  class="container-fluid bg-2 text-center">
    <h3 class="margin">What Am I?</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. </p>

    <div style="color:black;" class="container-fluid bg-2 text-center">
        <?php get_search_form(); ?>
    </div>

</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">

    <div class="row">
        <h3 class="margin">Where To Find Me?</h3><br>
        <!--  <h3 class="margin"><?php //__('Where To Find Me?','mywptheme')   ?></h3>-->
        <br>
        <div class="col-md-8">
            <?php if (have_posts()) :while (have_posts()) : the_post(); ?>
                <div class="col-sm-4">
                    <?php //get_template_part('content', get_post_format()); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header>
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"
                                   rel="bookmark">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <br>
                            <p> Opublikowano dnia: <?php
                                echo get_the_date('l F j, Y'); ?>
                                <time datetime="<?php
                                echo get_the_date('l F j, Y'); ?>"><!--data-->
                                    o godzinie:<?php the_time(); ?>
                                </time><!--godzina-->
                                autor: <?php the_author_link(); ?><!--wyswietlenie nazwy autora-->
                            </p>
                            <br>
                            <?php the_post_thumbnail('medium'); ?>
                        </header>
                        <?php the_excerpt(); ?>
                    </article>
                </div>
            <?php endwhile; ?>

            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
