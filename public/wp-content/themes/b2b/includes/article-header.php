<?php
$company_id = get_post_meta($post->ID,'company_id',true);
$category_id = get_post_meta($post->ID,'category_id',true);
set_query_var('company_id', $company_id);
set_query_var('category_id', $category_id);
$is_page_template = get_query_var('page_template',false);
$class_list = $is_page_template ? 'col-sm-12' : 'col-sm-8';
?>

<section id="profile-banner" class="lt-blue-bg pad-4 h-pad-0">
    <div class="container">
        <div class="row">
            <?php if ( !$is_page_template ): ?>
            <div class="col-sm-4">
                <?php
                if ( get_the_post_thumbnail( $post->ID, 'hero-thumb' ) ){
                    the_post_thumbnail( 'hero-thumb', array('class' => 'img-responsive') );
                }
                else{
                    echo "<img class=\"img-responsive\" src=\"https://via.placeholder.com/400x335\">";
                }
                ?>
            </div>
            <?php endif; // is page template ?>
            <div class="<?php echo $class_list; ?>>">
                <div id="breadcrumb">
                    <?php $crumb_list = [
                            [
                                    'name' => 'Home',
                                    'url' => $GLOBALS['site_url']
                            ]
                        ];
                    ?>
                    <span class="block">
                        <?php
                        if ($category_id){
                            $category = new Category();
                            $category_name = $category->category_name_by_id($category_id);
                            $middlecrumb = get_parent_page_url($category_id); // TODO buggy when the company's category doesn't have a guide
                            if ($middlecrumb){
                            array_push($crumb_list,[
                                    'name' => $category_name,
                                    'url' => $middlecrumb
                            ]);
                            } // middlecrumb exists
                        }
                        else{
//                            array_push($crumb_list,[
//                                'name' => 'Knowledge Center',
//                                'url' => $GLOBALS['site_url'] // TODO get final url
//                            ]);

                        }

                        // add the last crumb - the current page
                        array_push($crumb_list,[
                            'name' => get_the_title(),
                            'url' => get_the_permalink()
                        ]);

                        // echo out the breadcrumbs
                        // did it this way to make it easy for the json breadcrumbs
                        for ($i = 0; $i < (count($crumb_list) - 1);$i++){
                         echo "<a class=\"sm-text-1 dark-blue\" href=\"" . $crumb_list[$i]['url'] . "\">" . $crumb_list[$i]['name'] . "</a> / ";
                        }
                        // get the last one
                        echo "<a class=\"sm-text-1 w-500 blue\" href=\"" . $crumb_list[$i]['url'] . "\">" . $crumb_list[$i]['name'] . "</a>";

                        // now create the json
                        $list_items = [];
                        $position = 1;
                        foreach ($crumb_list as $crumb){
                            $list_item = [
                                "@type" => "ListItem",
                                "position" => $position,
                                "name" => $crumb['name'],
                                "item" => $crumb['url']
                            ];
                            array_push($list_items,$list_item);
                            $position++;
                        }

                        $breadcrumb_json = json_encode(
                            array(
                                "@context" => "http://schema.org",
                                "@type" => "BreadcrumbList",
                                "itemListElement" => array( $list_items )
                            )
                        );
                        ?>
                    </span>
                </div>
                <script type="application/ld+json"><?php echo $breadcrumb_json; ?></script>
                <h1 id="page-title" class="black text-5 w-600 benton"><?php the_title(); ?></h1>
                <span id="updated-date" class="w-500 sm-text-1">Updated <?php the_modified_date(); ?></span>
                <?php if ( get_field('subtitle_1') || get_field('subtitle_2') ) { // summary points exist ?>
                <ul id="article-summary" class="text-1 w-600 blue">
                    <?php

                    $count = 2;
                    $string = 'subtitle_';

                    for ($i = 1; $i <= $count; $i++ ){
                        $the_text = get_field($string . $i);
                        if (!$the_text) { continue; }
                        ?>
                        <li class="sm-pad-1 h-pad-0">
                            <svg class="sm-pad-2 v-pad-0" width="7px" height="12px">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill="#21218B" fill-rule="nonzero">
                                        <path d="M3.5,5.99306757 L7.00345424,2.87888602 C7.62262839,2.328509 8.57073695,2.38428009 9.12111398,3.00345424 C9.671491,3.62262839 9.61571991,4.57073695 8.99654576,5.12111398 L4.49654576,9.12111398 C3.92821673,9.62629534 3.07178327,9.62629534 2.50345424,9.12111398 L-1.99654576,5.12111398 C-2.61571991,4.57073695 -2.671491,3.62262839 -2.12111398,3.00345424 C-1.57073695,2.38428009 -0.622628395,2.328509 -0.00345424176,2.87888602 L3.5,5.99306757 Z"
                                              transform="translate(3.500000, 5.999992) rotate(-90.000000) translate(-3.500000, -5.999992) "></path>
                                    </g>
                                </g>
                            </svg> <?php echo $the_text; ?></li>

                    <?php } // for statement

                    ?>
                </ul>
                <?php } // summary points exist ?>
            </div>
        </div>
    </div>
</section>