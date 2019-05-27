<?php

$company_id = get_post_meta($post->ID,'company_id',true);
$company = new Company();
$company = $company->find_by_id($company_id);

if ($_POST){
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $rating = $_POST['review_rating'];
    $timestamp = date('Y-m-d G:i:s');

    $args = [
            'first_name' => $fname,
            'last_name' => $lname,
            'status' => 'submitted',
            'company_id' => $company_id,
            'rating' => (int) $rating,
            'review_text_unmoderated' => $_POST['review_text_unmoderated'],
            'date_submitted' => $timestamp
    ];
    $submitted_review = new Review($args);
    $submitted_review->save(); // these are escaped on the save

    // todo send notification? move to separate page?
    // todo is this secure enough? is there anything else we do .. eg. tokens?
}

get_header(); ?>
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
