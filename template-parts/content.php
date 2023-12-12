<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mywptheme
 */

?>
<article style="color:black;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"
               rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
        <br>
        <p><?php __('posted on', 'mywptheme') ?><?php
            echo get_the_date('l F j, Y'); ?>
            <time datetime="<?php
            echo get_the_date('l F j, Y'); ?>"><!--data-->
                <?php __('time : ', 'mywptheme') ?><?php the_time(); ?>
            </time><!--godzina-->
            <?php __('author',
                'mywptheme') ?><?php the_author_link(); ?><!--wyswietlenie nazwy autora-->
        </p>
        <br>
        <?php the_post_thumbnail('medium'); ?>
        <br>
        <hr>
    </header>
    <?php if (is_front_page()): ?>
        <?php the_excerpt(); ?>
    <?php elseif (is_single()): ?>
        <?php the_content(); ?>
    <?php endif; ?>
</article>
