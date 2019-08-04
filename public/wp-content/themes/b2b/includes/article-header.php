<?php $company_id = get_post_meta($post->ID,'company_id',true);
set_query_var('company_id', $company_id);
$is_page_template = get_query_var('page_template',false);
$class_list = $is_page_template ? 'col-sm-12' : 'col-sm-8';
?>

<section id="profile-banner" class="lt-blue-bg pad-4 h-pad-0">
    <div class="container">
        <div class="row">
            <?php if ( !$is_page_template ): ?>
            <div class="col-sm-4">
                <?php
                if ( get_the_post_thumbnail( $post->ID, 'hero-thumb' ) ){
                    the_post_thumbnail( 'hero-thumb', array('class' => 'img-responsive') );
                }
                else{
                    echo "<img class=\"img-responsive\" src=\"https://via.placeholder.com/400x335\">";
                }
                ?>
            </div>
            <?php endif; // is page template ?>
            <div class="<?php echo $class_list; ?>>">
                <div id="breadcrumb"><span class="block"><a class="sm-text-1 dark-blue" href="<?php echo site_url(); ?>">Home</a> / <a class="sm-text-1 dark-blue" href="<?php echo site_url(); ?>">Knowledge Center</a> / <a class="sm-text-1 w-500 blue" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></span></div>
                <h1 id="page-title" class="black text-5 w-600 benton"><?php the_title(); ?></h1>
                <span id="updated-date" class="w-500 sm-text-1">Updated <?php the_modified_date(); ?></span>
                <?php if ( get_field('subtitle_1') || get_field('subtitle_2') ) { // summary points exist ?>
                <ul id="article-summary" class="text-1 w-600 blue">
                    <?php

                    $count = 2;
                    $string = 'subtitle_';

                    for ($i = 1; $i <= $count; $i++ ){
                        $the_text = get_field($string . $i);
                        if (!$the_text) { continue; }
                        ?>
                        <li class="sm-pad-1 h-pad-0">
                            <svg class="sm-pad-2 v-pad-0" width="7px" height="12px">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#21218B" fill-rule="nonzero">
                                        <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z"
                                              transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                                    </g>
                                </g>
                            </svg> <?php echo $the_text; ?></li>

                    <?php } // for statement

                    ?>
                </ul>
                <?php } // summary points exist ?>
            </div>
        </div>
    </div>
</section>