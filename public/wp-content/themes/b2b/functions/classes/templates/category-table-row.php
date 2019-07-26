<?php
if ($company->is_accredited){ // is accredited gets cta
    ?>
<div id="top-company" class="pad-2 shadow-1x col-sm-12">
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-sm-push-3">
            <div class="row">
                <div class="col-xs-12">
                    <a id="company-title" class="block dark-blue text-2 w-500" href=""><?php echo $company->name; ?></a>
                    <div class="rating-box">
                        <div class="stars-overlay" style="width:<?php echo $company->rating; ?>%;">
                            <div class="stars-full"></div>
                        </div>
                    </div>
                    <span class="text-1 blue w-500 sm-pad-3 v-pad-0"><?php echo $company->star_count(); ?></span>
                    </span>
                </div>
                <div class="col-xs-12 text-right sm-text-1 md-blue w-500"><?php echo $company->award; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ul id="pod">
                        <?php
                        for($i = 1; $i <= 4; $i++){
                            $pod = 'pod_' . $i;
                            if ( !empty( $company->$pod ) ) { ?>
                                <li>
                                    <svg width="12px" height="9px">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                            <g transform="translate(-795.000000, -11352.000000)" stroke="#6EDB7B" stroke-width="2">
                                                <polyline id="Path-7" points="796 11356.8182 799.125 11360 806 11353"></polyline>
                                            </g>
                                        </g>
                                    </svg>
                                    <?php echo $company->$pod; ?>
                                </li>
                            <?php } // there is a POD_X
                        } // for loop
                        ?>
                    </ul>
                    <div class="divided"></div>
                </div>
            </div>
            <div class="row">
                <div class="sm-pad-2 h-pad-0"></div>
                <div class="col-sm-6">
                    <a href="<?php echo $company->get_review_link(); ?>" class="btn btn-block lt-blue-bg blue sm-pad-2 text-1 w-500">Read Reviews</a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo $company->go_link(); ?>" class="btn btn-block green-bg white sm-pad-2 text-1 w-500"><?php echo $company->get_CTA(); ?>
                        <svg class="sm-pad-2 v-pad-0" width="7px" height="12px">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                    <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-pull-9">
            <img class="img-responsive" src="<?php echo $company->get_logo(); ?>">
        </div>
    </div>
</div>
<?php } // is accredited

    else{ // not accredited ?>

        <div id="top-company" class="pad-2 shadow-1x col-sm-12">
            <div class="row">
                <div class="col-xs-12 col-sm-9 col-sm-push-3">
                    <div class="row">
                        <div class="col-xs-7">
                            <a id="company-title" class="block dark-blue text-2 w-500" href=""><?php echo $company->name; ?></a>
                            <div class="rating-box">
                                <div class="stars-overlay" style="width:<?php echo $company->rating; ?>%;">
                                    <div class="stars-full"></div>
                                </div>
                            </div>
                            <span class="text-1 blue w-500 sm-pad-3 v-pad-0"><?php echo $company->star_count(); ?></span>
                        </div>
                        <div class="col-sm-5 col-xs-12 text-right sm-text-1 md-blue w-500"><?php echo $company->award; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul id="pod">
                                <?php
                                for($i = 1; $i <= 4; $i++){
                                    $pod = 'pod_' . $i;
                                    if ( !empty( $company->$pod ) ) { ?>
                                        <li>
                                            <svg width="12px" height="9px">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                    <g transform="translate(-795.000000, -11352.000000)" stroke="#6EDB7B" stroke-width="2">
                                                        <polyline id="Path-7" points="796 11356.8182 799.125 11360 806 11353"></polyline>
                                                    </g>
                                                </g>
                                            </svg>
                                            <?php echo $company->$pod; ?>
                                        </li>
                                    <?php } // there is a POD_X
                                } // for loop
                                ?>
                            </ul>
                            <div class="divided"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="sm-pad-2 h-pad-0"></div>
                        <div class="col-sm-12">
                            <a href="<?php echo $company->get_review_link(); ?>" class="btn btn-block lt-blue-bg blue sm-pad-2 text-1 w-500">Read Reviews</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-sm-pull-9">
                    <img class="img-responsive" src="<?php echo $company->get_logo(); ?>">
                </div>
            </div>
        </div>

<?php } // not accredited ?>