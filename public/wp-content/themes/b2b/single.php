<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
                the_title();
                the_post();
                the_content();
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer();
