<?php
$args = array(
    'post_id' => $post->ID,
);

// The Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );

// Comment Loop
if ( $comments ) {
    echo '<hr>';
    echo "<h3 class='h3'>Users are saying...</h3>";

    foreach ( $comments as $comment ) {
        echo "<div class='col-12'>";
        echo "<div class=\"panel panel-default\">";
        echo "<div class=\"panel panel-heading\">";
        echo '<div class="text-right">' . get_comment_date('l, F j, Y') . '</div>';
        echo "</div>";
        echo "<div class=\"panel panel-body\">";
        echo '<p>' . $comment->comment_content . '</p>';
        echo '<small class="block text-1 w-500\">' . $comment->comment_author . '</small>';
        echo "</div>"; // panel-body
        echo "</div>"; // col-12
    }
} else {
	// echo 'Login to leave a comment?';
}
?>
