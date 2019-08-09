<?php
/* Template Name: Category Guide */

get_header();

if ( have_posts() ){
    while (have_posts()){

        // establish category & return class instance
        $category_id = get_post_meta($post->ID,'category_id',true);
        $company_id = get_post_meta($post->ID,'company_id',true);
        $category = new Category();
        $category = $category->find_by_id($category_id);

        // for template parts
        set_query_var('category_id', $category_id);
        set_query_var('company_id', $company_id);
        set_query_var('category_name', $category->name);

        ?>

    <section id="category-banner" class="lt-blue-bg">
        <div class="container">
            <div class="row">
                <div id="breadcrumb" class="col-sm-12">
                    <span class="block pad-1 h-pad-0">
                        <a class="sm-text-1 dark-blue" href="<?php echo site_url(); ?>">Home</a> /
                        <a class="sm-text-1 w-500 blue" href="<?php the_permalink(); ?>"><?php echo $category->name; ?></a>
                    </span>
                </div>
                <div class="col-sm-7">
                    <h1 id="guide-title" class="black text-5 w-600 benton sm-pad-2 h-pad-0"><?php echo the_title(); ?></h1>
                </div>
                <div class="col-sm-5">
                    <span id="research-data" class="text-2 w-400 dark-blue">Research Data</span>
                    <ul id="research-data" class="wrap-ul">
                        <?php
                        echo $category->get_stats();
                        ?>
                    </ul>
                    <span id="abstract-title" class="text-2 w-400 dark-blue">Highlights</span>
                    <p id="abstract"><?php echo get_the_excerpt(); ?></p>
                </div>
            </div>
        </div>
    </section>
        <?php // feature row

        $row_feature = false;
        if ($row_feature){
            echo "<section id=\"best-links\" class=\"container\">";
            $category->feature_row();
            echo "</section>";
        } // feature row
        ?>

    <section id="choosing" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="pad-3 h-pad-0 divided">
                    <h2 class="text-3 w-600 benton"><?php echo get_field('title_how_we_chose'); ?></h2>
                    <p class="text-1 w-400 h-pad-0"><?php echo get_field('description_how_we_chose'); ?></p>
                </div>
            </div>
        </div>
    </section>
    <section id="content" class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-push-4">
                <div class="pad-2"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-2 w-500 benton"><?php echo get_field('title_company_table'); ?></h2>
                        <!-- Top Guide -->
                        <?php $category->the_table(); ?>
                    </div>
                </div>
                <div class="pad-1"></div>
                <?php
                        // WYSIWYG
                        the_post();
                        the_content();
                ?>
            </div>
            <!-- Table of Contents -->
            <?php get_template_part('includes/sidebar')?>
        </div>
    </section>
<?php

        $breadcrumb_json = json_encode(

            array(
                "@context" => "http://schema.org",
                "@type" => "BreadcrumbList",
                "itemListElement" => array(
                    array(
                        "@type" => "ListItem",
                        "position" => 1,
                        "name" => "Home",
                        "item" => $GLOBALS['site_url']
                    ),
                    array(
                        "@type" => "ListItem",
                        "position" => 2,
                        "name" => get_the_title(),
                        "item" => get_the_permalink()
                    ),
                )
            )
        );

        echo "<script type=\"application/ld+json\">{$breadcrumb_json}</script>";

    } // while have posts
} // if have posts

get_footer();
