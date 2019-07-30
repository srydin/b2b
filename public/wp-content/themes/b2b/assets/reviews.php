<div class="col-md-7">
        <?php
        $company_name = get_query_var('company_name');
        echo "<h2 class='h2'>$company_name Reviews</h2>";
        $company_id = get_query_var('company_id','0');
        $reviews = new Review(['company_id' => $company_id]);
        $reviews_arr = $reviews->published_reviews_by_company_id();
        if (!empty($reviews_arr)){
            foreach ($reviews_arr as $review){
                $output = "<div class=\"panel-body lt-blue-bg\">";
                $output .= "<div class=\"flex-rating\" style='align-items: center; justify-content: left'><div class=\"rating-box\"><div class=\"stars-overlay\" style=\"width:90%;\"><div class=\"stars-full\"></div></div></div><span class=\"num-score text-1 blue w-500 sm-pad-3 v-pad-0\">4.50</span></div>";
                $output .= "<div class=''>";
                $output .= ucfirst($review['review_text_moderated']);
                $output .= "</div>";
                $output .= "-" . $review['first_name'] . ' ' . $review['last_name'];
                $output .= "</div>";
                echo $output;
            }
        }
        else {
            echo 'No reviews... yet.';
        }
        ?>
</div>