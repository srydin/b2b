<style>
    .comment{
        margin-bottom: 20px;
        background-color: #F7F7FB;
        border: 1px solid #F7F7FB;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.05);
        box-shadow: 0 1px 1px rgba(0,0,0,0.05);
    }
    .comment-header{
        color: #fff;
        background-color: #78DC84;
        padding: 10px 15px;
    }
    .comment-body{
        padding: 15px;
    }
</style>
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
        echo "<div class=\"comment\">";
        echo "<div class=\"comment-header w-600\">";
        echo '<div class="text-right">' . get_comment_date('l, F j, Y') . '</div>';
        echo "</div>";
        echo "<div class=\"comment-body\">";
        echo '<p>' . $comment->comment_content . '</p>';
        echo '<small class="block text-1 w-500 benton\">' . $comment->comment_author . '</small>';
        echo "</div>"; // panel-body
        echo "</div>"; // col-12
    }
} else {
	// echo 'Login to leave a comment?';
}
?>
