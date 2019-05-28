<?php

$company_id = get_post_meta($post->ID,'company_id',true);
$company = new Company();
$company = $company->find_by_id($company_id);

if ($_POST){
    collect_review($company_id);
}

get_header();
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <h1 class="h1"><?php echo get_the_title(); ?></h1>

                <?php
                    the_post();
                    the_content();
                    ?>
            </div>
        </div>

        <?php
        set_query_var('company_id', $company_id);
        set_query_var('company_name', $company->name);
        get_template_part('assets/reviews'); ?>
    </div>
<?php get_footer();
