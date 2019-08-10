<?php
$args = array(
   // args here
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
		echo '<strong>' . $comment->comment_author . '</strong>';
        echo "</div>";
        echo "<div class=\"panel panel-body\">";
        echo '<p>' . $comment->comment_content . '</p>';
        echo '<span>' . comment_date('l, F j, Y') . '</span>';
        echo "</div>";
        echo "</div>";
    }
} else {
	echo 'No comments found.';
}
?>
