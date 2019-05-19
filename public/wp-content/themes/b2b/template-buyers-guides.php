<?php
/* Template Name: Category Guide */

$category_id = get_post_meta($post->ID,'category_id',true);
$category = new Category();
$category = $category->find_by_id($category_id);


get_header(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <h1 class="h1"><?php echo get_the_title();?></h1>
                <?php
                    $category->the_table(); // b2b companies
                    the_post();
                    the_content();
                    ?>
            </div>
        </div>

        <?php
        set_query_var('category_id', $company_id);
        ?>
    </div>
<?php get_footer();
