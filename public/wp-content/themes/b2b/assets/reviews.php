<div class="col-md-7">
        <?php
        // Start the reviews section with a headline
        $company_name = get_query_var('company_name');
        echo "<h2 id='reviews' class='h2'>$company_name Reviews</h2>";

        // set variables
        $company_id = get_query_var('company_id','0');
        $current_pagination_page = (int) get_query_var('page', '1');
        $current_pagination_page = ($current_pagination_page == 0) ? 1 : $current_pagination_page; // if no 'page' is found it's page 1

        // create reviews object, get reviews and meta data about them
        $reviews = new Review(['company_id' => $company_id]);
        $reviews_meta = $reviews->get_reviews_meta_data();
        $is_pagination = ( $reviews_meta['pages'] > 1 ) ? true : false;

        // get reviews for this page
        $reviews_arr = $reviews->published_reviews_by_company_id($current_pagination_page);

        // loop through each review and style them // TODO add other fields like city/state/title/etc
        if (!empty($reviews_arr)) {
            foreach ($reviews_arr as $review) {
                $output = "<div class=\"panel-body lt-blue-bg\">";
                $output .= "<div class=\"flex-rating\" style='align-items: center; justify-content: left'><div class=\"rating-box\"><div class=\"stars-overlay\" style=\"width:90%;\"><div class=\"stars-full\"></div></div></div><span class=\"num-score text-1 blue w-500 sm-pad-3 v-pad-0\">4.50</span></div>";
                $output .= "<div class=''>";
                $output .= 'Proof of concept - This is not a duplicate review - Review ID ' . $review['id'] . ': ' . ucfirst($review['review_text_moderated']);
                $output .= "</div>";
                $output .= "-" . $review['first_name'] . ' ' . $review['last_name'];
                $output .= "</div>";
                echo $output;
            } // foreach review, echo content

            // is pagination required?
            if ($is_pagination) {

                $url = get_the_permalink();

                $output = "<nav aria-label=\"Review navigation\"><ul class=\"pagination\">";
                if ($current_pagination_page > 1) {
                    $output .= "<li><a rel='prev' href=\"{$url}\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
                }

                for ($i = 1; $i <= $reviews_meta['pages']; $i++) {
                    $active_page = ( $current_pagination_page == $i) ? ' class="active"' : '';

                    $ext = $i > 1 ? $i . '#reviews' : '#reviews ';
                    $output .= "<li{$active_page}><a href=\"{$url}{$ext}\">{$i}</a></li>";
                }
                if ($current_pagination_page < $reviews_meta['pages']) {
                    $output .= "<li><a rel='next' href=\"{$url}\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
                }
                $output .= "</ul></nav>";
                echo $output;
            } // is paginated
        } // reviews exist

        else {
            // no review exist yet or are not moderated
            echo '<p class="mb1">When we\'ve collected enough reviews for a good sample, we\'ll publish them here.</p>';
        }

        // this button should probably be modified to appear more than once depending on the length of the reviews block
        echo "<a class=\"btn mb1 green-bg white sm-pad-2 text-1 w-500\" href=\"/review?company_id=$company_id\">Leave a review</a>";
        ?>
</div><!-- col-7 -->