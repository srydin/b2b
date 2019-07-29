<?php
// variables to use if needed
$category_id = get_query_var('category_id');
$category_name = get_query_var('category_name');
$company_id = get_query_var('company_id');
?>
<div id="sidebar" class="col-sm-4 col-sm-pull-8">
    <div class="pad-2 affix-top" data-spy="affix" data-offset-top="1090" style="top:4.656em;">
        <?php if ( is_page_template('template-buyers-guides.php') ){

            // is guide ?>

            <span class="sm-text-1 w-500">In this guide</span>
            <ul id="table-of-contents">
                <li><a class="text-1 dark-blue" href="">Best <?php echo $category_name; ?> List</a></li>
                <li><a class="text-1 dark-blue" href="">Top Rated Solutions</a></li>
                <li><a class="text-1 dark-blue" href="">How We Select</a></li>
                <li><a class="text-1 dark-blue" href="">Solution Overview</a></li>
                <li><a class="text-1 dark-blue" href="">Reviews</a></li>
                <li><a class="text-1 dark-blue" href="">FAQ</a></li>
                <li><a class="text-1 dark-blue" href="">Resources</a></li>
            </ul>

        <?php
        } // is guide

            if ( !empty( $company_id ) ) {

            $company = new Company();
            $company = $company->find_by_id($company_id);

            ?>
        <div id="cta-fixed" class="lt-blue-bg pad-3 text-center hidden-xs">
            <span class="block text-2 w-500 dark-blue"><?php echo $company->name; ?></span>
            <span class="sm-text-1 w-500 md-blue"><?php echo $company->award; ?></span>
            <img class="img-responsive pad-1" style="max-width: 210px" src="<?php echo $company->get_logo(); ?>">
            <div class="flex-rating">
                <div class="rating-box">
                    <div class="stars-overlay" style="width:<?php echo $company->rating; ?>%;">
                        <div class="stars-full"></div>
                    </div>
                </div>
                <span class="num-score text-1 blue w-500 sm-pad-3 v-pad-0"><?php echo $company->star_count(); ?></span>
            </div>
            <div class="sm-pad-1"></div>
            <a href="<?php echo $company->go_link(); ?>" class="btn btn-block green-bg white text-1 w-500 sm-pad-1"><?php echo $company->get_CTA(); ?> <svg class="sm-pad-2 v-pad-0" width="7px" height="12px">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                            <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                        </g>
                    </g>
                </svg></a>
        </div>
        <?php } // is_company_sponsor ?>
    </div>
</div>