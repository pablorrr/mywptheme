<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mywpheme
 */
?>
<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing Found', ' mywpheme'); ?></h1>
    </header><!-- .page-header -->
    <hr class="hr"/><!--dividers-->
    <div class="page-content">
    
       
        <?php if (is_search()) : ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.',
                    'mywpheme'); ?></p>
            <?php
            get_search_form();
          endif; ?>
        <hr class="hr"/><!--dividers-->
    </div><!-- .page-content -->
</section><!-- .no-results -->
