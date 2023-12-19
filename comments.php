<div id="comments" class="comments-area">
<?php 
    // Czy wpis jest chroniony hasłem?
    if ( post_password_required() ) : ?>
    <p class="nopassword">
        <?php _e('This post is protected by password. Please enter the password','mywptheme'); ?>
       </p>

<?php
        // return - przerwij dzilanie pliku w tym mijescu jesli post jest chroniony hasełem
        return;
    endif;

    // Sprawdzenie, czy są komentarze
    if ( have_comments() ) : ?>
    <h2 id="comments-title">
    <?php _e('This post has','mywptheme');?>
    <h3 style="color: black;">
       <!--  printf - funkcja w budowana w php  zabezpieczanie kodu - dopuszcza tylko ciagi znakow  typu string  -->
    <!-- nx -  https://developer.wordpress.org/reference/functions/_nx/   - wbudowana w wp celem tlumaczenie ciagu nzakow na dany jezyk oraz dopasowanie sie do liczby mnogiej  -->
   <!-- get_comments_number() -pobiera liczbe komentarzy , funkcja wp  -->
   <!-- https://developer.wordpress.org/reference/functions/number_format_i18n/  funkcja wp , formatuje  ciag znakow na liczbe zmiennprzecinowa , u nas zabezpiecza kod przed atakiem wprowdzany ciag znkow ma byc tylko liczba -->
        <?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'mywptheme' ), number_format_i18n( get_comments_number() ) );?>
    </h3>
    </h2><br>
    <ol class="commentlist">
    <?php 
        // Wyświetlanie listy komentarzy
        wp_list_comments();
    ?>
    </ol>

   
<?php endif;?>
<br>
<?php 
    // Formularz dodawania komentarzy
    comment_form( $args = array(
        'id_form'           => 'commentform',  //id formularza
        'id_submit'         => 'commentsubmit',//id przycisku wyslij button formularza
		'class_form'     	=> 'comment-form',// klasa css formulrza
		'class_submit'      => 'btn btn-primary btn-sm',//klsa css przycisku
        'title_reply'       => __( 'Leave a Reply', 'mywptheme' ),//napisy napisz odpowiedz
        'title_reply_to'    => __( 'Leave a Reply to %s', 'mywptheme' ),//odpowiedz do
        'cancel_reply_link' => __( 'Cancel Reply', 'mywptheme' ), //napis do buttona cancel reply 
        'label_submit'      => __( 'Post Comment', 'mywptheme' ),//napis do przycisku buttona formularza
//html dla textarea w formulrzau
        'comment_field' =>  '<textarea placeholder="Start typing..." id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
//allowed tags - okreslenie co moze sie pojawic w komenatrzu - mozliwosc ustwienia w panelu admina
        'comment_notes_after' => '<p class="form-allowed-tags">' .
            __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'mywptheme' ) .
            '</p><div class="alert alert-info">' . allowed_tags() . '</div>'
// Checkout the docs for more: http://codex.wordpress.org/Function_Reference/comment_form
      ));
?>
</div>
</div>