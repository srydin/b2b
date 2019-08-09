<?php

$company_id = get_post_meta($post->ID,'company_id',true);
$company = new Company();
$company = $company->find_by_id($company_id); // instance by id
$category_id = $company->get_category_id();
$category_name = $company->get_category_name();

// for template parts
set_query_var('category_id', $category_id);
set_query_var('company_id', $company_id);
set_query_var('category_name', $category_name);
set_query_var('company_name', $company->name);

if ($_POST){
    collect_review($company_id);
}

$review_json = json_encode(
    array(
        "@context" => "http://schema.org",
        "@type" => "SoftwareApplication",
        "applicationCategory" => "BusinessApplication",
        "operatingSystem" => "Windows 7, OSX 10.6",
        "name" => $company->name,
        "review" => [
                "@type" => "Review",
                "reviewRating" => [
                    "@type" => "Rating",
                    "ratingValue" => $company->star_count(),
                ],
                "author" => [
                    "@type" => "Organization",
                    "name" => "B2Breviews.com",
                ]
        ]
    )
);

get_header();

if ( have_posts() ) {
    while (have_posts()) {
        the_post(); // start the loop
        ?>

    <section id="profile-banner" class="lt-blue-bg pad-4 h-pad-0">
        <div class="container">
            <div class="row">
                <div id="breadcrumb" class="col-sm-12">
                    <span class="block">
                        <a class="sm-text-1 dark-blue" href="<?php echo $GLOBALS['site_url']; ?>">Home</a> /
                        <?php
                        $middlecrumb = get_parent_page_url($category_id); // TODO buggy when the company's category doesn't have a guide
                        if ($middlecrumb){
                            echo "<a class=\"sm-text-1 dark-blue\" href=\"{$middlecrumb}\">{$category_name}</a> / ";
                        } // middlecrumb exists
                        ?>
                        <a class="sm-text-1 w-500 blue" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </span>
                </div>
                <div class="col-sm-7">
                    <h1 id="profile-title" class="black text-5 w-600 benton"><?php echo get_the_title(); ?></h1>
                    <span id="updated-date" class="w-500 sm-text-1">Updated <?php the_modified_date(); ?></span>
                    <p id="excerpt" class="text-1"><?php the_excerpt(); ?></p>
                </div>
            </div>
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
                            "name" => $category_name,
                            "item" => $middlecrumb
                        ),
                        array(
                            "@type" => "ListItem",
                            "position" => 3,
                            "name" => get_the_title(),
                            "item" => get_the_permalink()
                        ),
                    )
            )
        );

        ?>

        <section id="content" class="container">
            <div class="row">
                <div class="col-sm-7">
                    <?php the_content(); ?>
                </div>
                <!-- Table of Contents -->
                <?php get_template_part('includes/sidebar'); ?>
            </div>
        </section>

        <section id="reviews" class="container">
            <div class="row">
                <?php get_template_part('assets/reviews'); ?>
                <!-- Table of Contents -->
            </div>
        </section>


        <script type="application/ld+json"><?php echo $breadcrumb_json; ?></script>
        <script type="application/ld+json"><?php echo $review_json; ?></script>

        <?php

    } // while have posts
} // have posts

get_footer();