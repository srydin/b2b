<?php get_header(); ?>
        <?php

        //        $companies = Company::find_all();
        //
        //        foreach ($companies as $company){
        //            echo $company->name;
        //        }
        //        echo '<br>';
        //
        //        echo "count: " . Company::count_all();
        //        echo '<br>';
        //
        //        $company1 = Company::find_by_id(7);
        //        echo $company1->name;
        //        echo '<br>';

        //        $args = ['name' => 'jack', 'id' => null];
        //        $a = new Company($args);
        //        echo '<br>';
        //
        //        echo $a->name;
        //        $result = $a->save();
        //        $new_id = 0;
        //        if($result === true) {
        //            $new_id = $a->id;
        //        }

        //        var_dump(get_class_vars('Company'));

        //        $company1->name = "John";
        //        $company1->delete();

        $company86 = Company::find_by_id(34);
        //        $result = $company86->delete();
        $result = "";
        if($result === true) {
            echo 'goodbye';
        }

        ?>
    <section id="top-banner" class="pad-3 dark-blue-bg">
        <h1 class="white flex-text-5 w-600 benton">Make Your Business Better</h1>
        <h2 class="white flex-text-3 w-500 benton">B2B Reviews helps you find business solutions.</h2>
        <div id="form-wrapper" class="pad-1 h-pad-0 sm-text-wrapper text-center">
            <input class="sm-text-1 pad-2" placeholder="Select a category" type="text">
            <button class="text-1 w-700 white benton">Find Solutions</button>
        </div>
        <picture>
            <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/top-banner.webp">
            <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/top-banner.jpg">
            <img src="wp-content/themes/b2b/assets/images/top-banner.jpg">
        </picture>
    </section>
    <section id="quick-links" class="benton">
        <div id="quick-1" class="pad-2 shadow-2x text-center text-2 w-500">
            Who We Are
        </div>
        <div id="quick-2" class="pad-2 shadow-2x text-center text-2 w-500">
            Business Categories
        </div>
        <div id="quick-3" class="pad-2 shadow-2x text-center text-2 w-500">
            Popular Articles
        </div>
    </section>
    <section id="who-we-are" class="pad-3 divided">
        <h2 class="lg-text-wrapper text-4 h-pad-0 w-700 text-center benton">We help solve complex problems</h2>
        <p class="sm-text-wrapper text-1 sm-pad-1 h-pad-0 w-400 text-center">Cras semper id mauris feugiat tincidunt. Fusce ac massa molestie, laoreet felis non, tincidunt elit. Aenean metus quam, tincidunt suscipit mi non viverra dunt suscipit min.</p>
        </div>
    </section>
    <section id="business-categories" class="pad-4 divided">
        <h2 class="xs-text-wrapper text-3 sm-pad-2 w-400 text-center benton">Helping businesses make better decisions</h2>
        <a class="text-1 w-500 text-center sm-pad-3 h-pad-0 blue underline block benton" href="">View All Categories</a>
        <ul id="featured-category-loop" class="benton lg-text-wrapper pad-3 v-pad-0">
            <li class="pad-1">
                <h3 class="green-bg pad-1"><a class="white" href="">Payroll Services</a></h3>
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/payroll-services.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                    <img src="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                </picture>
            </li>
            <li class="pad-1">
                <h3 class="green-bg pad-1"><a class="white" href="">Payroll Services</a></h3>
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/payroll-services.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                    <img src="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                </picture>
            </li>
            <li class="pad-1">
                <h3 class="green-bg pad-1"><a class="white" href="">Payroll Services</a></h3>
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/payroll-services.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                    <img src="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                </picture>
            </li>
            <li class="pad-1">
                <h3 class="green-bg pad-1"><a class="white" href="">Payroll Services</a></h3>
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/payroll-services.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                    <img src="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                </picture>
            </li>
            <li class="pad-1">
                <h3 class="green-bg pad-1"><a class="white" href="">Payroll Services</a></h3>
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/payroll-services.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                    <img src="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                </picture>
            </li>
            <li class="pad-1">
                <h3 class="green-bg pad-1"><a class="white" href="">Payroll Services</a></h3>
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/payroll-services.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                    <img src="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                </picture>
            </li>
            <li class="pad-1">
                <h3 class="green-bg pad-1"><a class="white" href="">Payroll Services</a></h3>
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/payroll-services.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                    <img src="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                </picture>
            </li>
            <li class="pad-1">
                <h3 class="green-bg pad-1"><a class="white" href="">Payroll Services</a></h3>
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/payroll-services.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                    <img src="wp-content/themes/b2b/assets/images/payroll-services.jpg">
                </picture>
            </li>
        </ul>
        <ul id="category-loop" class="benton lg-text-wrapper pad-3 v-pad-0">
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="shadow-2x w-400 text-2">
                <a class="pad-1 v-pad-0 dark-blue" href="">Link name</a>
                <a class="sm-pad-1 green-bg">
                    <svg class="pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Path-2" fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
        </ul>
    </section>
    <section id="popular-articles" class="divided">
        <div class="pad-4">
            <h4 class="sm-text-wrapper text-3 text-center benton">Popular Articles</h4>
            <a class="text-1 w-500 text-center sm-pad-3 h-pad-0 blue underline block benton" href="">Visit Knowledge Center</a>
        </div>
        <div class="article-module divided">
            <div class="photo">
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/article-img.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/article-img.jpg">
                    <img src="wp-content/themes/b2b/assets/images/article-img.jpg">
                </picture>
            </div>
            <div class="blurb pad-3 lt-blue-bg">
                <div class="sm-text-wrapper">
                    <h3 class="flex-text-4 pad-0 w-700 benton">Elit suscipit mi non viverra</h3>
                    <p class="text-1 pad-1 h-pad-0 w-400">Cras semper id mauris feugiat tincidunt. Fusce ac massa molestie, laoreet felis non, tincidunt elit. Aenean metus quam, tincidunt suscipit mi non.</p>
                    <a class="inline blue pad-1 white-bg shadow-3x w-500 benton" href=""><span class="pad-1 v-pad-0">Read Article</span></a>
                </div>
            </div>
        </div>
        <div id="cta-module" class="pad-3 shadow-2x">
            <svg id="cta-logo" class="pad-2 h-pad-0" width="150px" height="36px">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path d="M0,0 L49,0 C52.8659932,-7.10171439e-16 56,3.13400675 56,7 L56,36 L7,36 C3.13400675,36 4.73447626e-16,32.8659932 0,29 L0,0 Z" id="Rectangle" fill="#49C958"></path>
                    <g transform="translate(6.587000, 8.658000)" fill-rule="nonzero">
                        <path d="M7.429,17.342 L0,17.342 L0,0.322 L7.153,0.322 C9.982,0.322 13.34,0.759 13.34,4.508 C13.34,6.969 11.822,8.073 10.12,8.395 L10.12,8.441 C12.19,8.809 13.754,9.798 13.754,12.627 C13.754,16.33 10.304,17.342 7.429,17.342 Z M4.508,3.841 L4.508,7.107 L6.693,7.107 C8.349,7.107 8.97,6.463 8.97,5.474 C8.97,4.462 8.349,3.841 6.739,3.841 L4.508,3.841 Z M4.508,10.281 L4.508,13.892 L6.808,13.892 C8.533,13.892 9.269,13.225 9.269,12.052 C9.269,10.879 8.51,10.281 6.762,10.281 L4.508,10.281 Z M28.589,17.342 L15.456,17.342 L15.456,16.974 C15.456,14.513 15.801,12.075 20.286,9.2 C22.977,7.475 24.012,7.038 24.012,5.382 C24.012,4.393 23.368,3.818 22.287,3.818 C21.16,3.818 19.734,4.669 18.745,6.049 L15.548,3.703 C17.135,1.518 19.182,-7.10542736e-15 22.425,-7.10542736e-15 C26.289,-7.10542736e-15 28.474,1.932 28.474,5.06 C28.474,6.785 28.221,8.464 24.955,10.534 C22.747,11.937 21.068,13.018 20.976,13.8 L28.589,13.8 L28.589,17.342 Z M38.456,17.342 L31.027,17.342 L31.027,0.322 L38.18,0.322 C41.009,0.322 44.367,0.759 44.367,4.508 C44.367,6.969 42.849,8.073 41.147,8.395 L41.147,8.441 C43.217,8.809 44.781,9.798 44.781,12.627 C44.781,16.33 41.331,17.342 38.456,17.342 Z M35.535,3.841 L35.535,7.107 L37.72,7.107 C39.376,7.107 39.997,6.463 39.997,5.474 C39.997,4.462 39.376,3.841 37.766,3.841 L35.535,3.841 Z M35.535,10.281 L35.535,13.892 L37.835,13.892 C39.56,13.892 40.296,13.225 40.296,12.052 C40.296,10.879 39.537,10.281 37.789,10.281 L35.535,10.281 Z" id="B2B" fill="#FFFFFF"></path>
                        <path d="M57.293,3.381 L57.293,8.027 L59.846,8.027 C62.008,8.027 63.043,7.406 63.043,5.681 C63.043,4.002 62.008,3.381 59.846,3.381 L57.293,3.381 Z M57.293,17.342 L53.613,17.342 L53.613,0.322 L60.007,0.322 C64.193,0.322 66.7,1.817 66.7,5.589 C66.7,8.28 65.435,9.752 63.158,10.442 L66.953,17.342 L62.997,17.342 L59.455,10.925 L57.293,10.925 L57.293,17.342 Z M75.072,17.595 C71.875,17.595 68.816,15.962 68.816,11.224 C68.816,6.463 72.45,4.83 74.98,4.83 C77.51,4.83 80.615,6.095 80.615,11.661 L80.615,12.213 L72.496,12.213 C72.68,14.237 73.807,15.019 75.348,15.019 C76.797,15.019 78.154,14.306 78.982,13.547 L80.408,15.755 C78.982,16.974 77.211,17.595 75.072,17.595 Z M72.542,10.028 L77.303,10.028 C77.119,8.303 76.337,7.475 74.957,7.475 C73.807,7.475 72.818,8.234 72.542,10.028 Z M89.424,17.365 L85.698,17.365 L81.305,5.083 L85.123,5.083 L87.699,13.248 L87.745,13.248 L90.321,5.083 L93.794,5.083 L89.424,17.365 Z M99.015,3.404 L95.289,3.404 L95.289,0.437 L99.015,0.437 L99.015,3.404 Z M98.992,17.342 L95.312,17.342 L95.312,5.083 L98.992,5.083 L98.992,17.342 Z M107.525,17.595 C104.328,17.595 101.269,15.962 101.269,11.224 C101.269,6.463 104.903,4.83 107.433,4.83 C109.963,4.83 113.068,6.095 113.068,11.661 L113.068,12.213 L104.949,12.213 C105.133,14.237 106.26,15.019 107.801,15.019 C109.25,15.019 110.607,14.306 111.435,13.547 L112.861,15.755 C111.435,16.974 109.664,17.595 107.525,17.595 Z M104.995,10.028 L109.756,10.028 C109.572,8.303 108.79,7.475 107.41,7.475 C106.26,7.475 105.271,8.234 104.995,10.028 Z M120.842,17.342 L117.438,17.342 L113.85,5.083 L117.576,5.083 L118.634,9.476 C118.956,10.764 119.163,11.638 119.439,13.225 L119.485,13.225 C119.784,11.615 119.991,10.718 120.336,9.384 L121.394,5.083 L124.269,5.083 L125.396,9.453 C125.764,10.741 125.948,11.638 126.27,13.225 L126.316,13.225 C126.615,11.661 126.822,10.764 127.167,9.499 L128.294,5.083 L131.583,5.083 L127.995,17.342 L124.568,17.342 L122.728,9.867 L122.682,9.867 L120.842,17.342 Z M137.862,17.595 C135.171,17.595 133.377,16.767 132.135,15.709 L133.607,13.639 C134.711,14.605 136.367,15.226 137.862,15.226 C139.012,15.226 139.817,14.835 139.817,14.03 C139.817,13.179 139.173,12.857 137.494,12.558 C135.171,12.144 132.687,11.592 132.687,8.717 C132.687,6.256 134.711,4.83 137.448,4.83 C139.955,4.83 141.473,5.474 142.83,6.555 L141.381,8.648 C140.139,7.797 138.92,7.314 137.77,7.314 C136.712,7.314 136.114,7.728 136.114,8.395 C136.114,9.131 136.781,9.43 138.299,9.706 C140.714,10.12 143.267,10.672 143.267,13.455 C143.267,16.422 140.691,17.595 137.862,17.595 Z" id="Reviews" fill="#232323"></path>
                    </g>
                </g>
            </svg>
            <h2 class="md-text-wrapper text-3 w-500 benton">Want exclusive resources and solutions for your business?</h2>
            <div id="email-input" class="pad-2 h-pad-0">
                <input class="pad-1 text-1" placeholder="E-mail" type="email">
                <button class="pad-1 text-1 green-bg white w-700">
                    <span class="sm-pad-2 v-pad-0 benton">Join Us</span>
                    <svg class="sm-pad-2 v-pad-0" width="7px" height="12px">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g fill="#FFFFFF" fill-rule="nonzero">
                                <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z" transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
        <div class="article-module">
            <div class="blurb pad-3 lt-blue-bg">
                <div class="sm-text-wrapper">
                    <h3 class="flex-text-4 pad-0 w-700 benton">Semper id Maurus</h3>
                    <p class="text-1 pad-1 h-pad-0 w-400">Cras semper id mauris feugiat tincidunt. Fusce ac massa molestie, laoreet felis non, tincidunt elit. Aenean metus quam, tincidunt suscipit mi non.</p>
                    <a class="inline blue pad-1 white-bg shadow-3x w-500 benton" href=""><span class="pad-1 v-pad-0">Read Article</span></a>
                </div>
            </div>
            <div class="photo">
                <picture>
                    <source type="image/webp" srcset="wp-content/themes/b2b/assets/images/article-img-2.webp">
                    <source type="image/jpeg" srcset="wp-content/themes/b2b/assets/images/article-img-2.jpg">
                    <img src="wp-content/themes/b2b/assets/images/article-img-2.jpg">
                </picture>
            </div>
        </div>
    </section>

<?php get_footer();
