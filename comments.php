<?php 
    $args = array(
	'comment_field'        => '<p class="comment-form-comment"><label for="comment">'
            . '</label><textarea id="comment" name="comment" cols="45" '
            . 'rows="8" aria-required="true"></textarea></p>',
	'comment_notes_after'  => ''
    );
    comment_form( $args );
    
    wp_list_comments();
    if(function_exists('brains_wp_comments_corenavi')) {
        brains_wp_comments_corenavi(); 
    }//pagination
?>