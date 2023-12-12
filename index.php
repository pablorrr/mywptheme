<?php get_header(); ?>
<h1 style="color: red;">index.php</h1>
<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
    <h3 class="margin"><?php __('What Am I?', 'mywptheme') ?></h3>
    <p><?php __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat.', 'mywptheme') ?> </p>
    <div style="color:black;" class="container-fluid bg-2 text-center">
        <?php get_search_form(); ?>
    </div>
</div>
<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">
    <div class="row">
        <h3 class="margin"><?php __('Where To Find Me?', 'mywptheme') ?></h3>
        <br>
        <div class="col-md-8">
            <?php if (have_posts()) :while (have_posts()) : the_post(); ?>
                <div class="col-sm-4">
                    <?php get_template_part('template-parts/content', get_post_format()); ?>
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
