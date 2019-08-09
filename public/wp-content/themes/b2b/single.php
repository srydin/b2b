<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

            if ( have_posts() ){
                while (have_posts()){
                    the_post();
                    get_template_part('includes/article-header');
                    get_template_part('includes/article-main');

                    // TODO add comments
//                    if ( comments_open() || get_comments_number() ) {
//                        comments_template();
//                    }
                }
            }

        ?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer();
