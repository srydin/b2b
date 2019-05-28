<?php
/* Template Name: Review Collection */

if (!empty($_GET['company_id'])){
    $company_id = (int) htmlspecialchars($_GET['company_id']);
    $_SESSION['company_id'] = $company_id;
    $url = $_SERVER['REQUEST_URI'];
    $url = remove_query_arg('company_id');
    wp_redirect($url);
}
$company_id = (isset($_SESSION['company_id']) ? $_SESSION['company_id'] : 6 ); // todo add new company if there is no set company ID?
$company = new Company();
$company = $company->find_by_id($company_id);

if ($_POST){
    collect_review($company_id);
}

get_header();
var_dump($_SESSION);
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <h1 class="h1"><?php echo $company->name . ' ' . get_the_title();?></h1>
                <?php
                    the_post();
                    the_content();
                    ?>
            </div>
        </div>

        <?php
            review_form($company->id);
        ?>
    </div>
<?php get_footer();
