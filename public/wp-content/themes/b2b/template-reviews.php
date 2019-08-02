<?php
/* Template Name: Review Collection */
$url = $_SERVER['REQUEST_URI'];

$is_reset = !empty( $_GET['restart'] );

if ( $is_reset ) {
    unset ( $_SESSION['company_id'] );
    $url = remove_query_arg('restart');
    wp_redirect($url);
}

// try to gather company id from the url param
if ( !empty( $_GET['company_id'] ) ) {
    $_SESSION['company_id'] = $_GET['company_id'];
    $url = $_SERVER['REQUEST_URI'];
    $url = remove_query_arg('company_id');
    wp_redirect($url);
}
// try to find a company id in the session
$company_id = (isset($_SESSION['company_id']) ? $_SESSION['company_id'] : false );

// create an empty company object
$company = new Company();

// look for an existing company, default to the empty object
if ($company_id){
    $company_exists = $company->find_by_id($company_id);
    $company = ($company_exists) ? $company_exists : $company;
}

// save reviews on form submission
if ($_POST){
    collect_review($company_id);
}

get_header();
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 15px">
            <h1 class="h1">Leave a review <?php if ($company_id){echo 'about ' . $company->name; } ?></h1>
                <?php if ($company_id) { ?><a href="<?php echo $url; ?>?restart=1">Start over</a> <?php } // restart

                display_b2b_errors(); // display errors, if any.

                    the_post(); // do the wp stuff
                    the_content();
                    ?>
            </div>
        </div>

        <?php
        review_form($company); // display the form
        ?>
    </div>
<?php get_footer();
