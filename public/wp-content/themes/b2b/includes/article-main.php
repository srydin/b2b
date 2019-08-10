<section id="content" class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-push-4">
            <?php the_content();
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
            ?>
        </div>
        <?php get_template_part('includes/sidebar'); ?>
    </div>
