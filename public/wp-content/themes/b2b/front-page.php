<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

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
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer();
