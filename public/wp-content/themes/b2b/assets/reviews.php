<style>
    .review-card{
        margin-bottom: 20px;
        background-color: #F7F7FB;
        border: 1px solid #F7F7FB;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.05);
        box-shadow: 0 1px 1px rgba(0,0,0,0.05);
    }
    .review-header{
        padding: 10px 15px;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    .review-body{
        padding: 15px;
    }
</style>
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

                echo "<div class='col-12'>";
                echo "<div class=\"review-card\">";
                echo "<div class=\"review-header lt-blue-bg blue\">";
                echo '<div class="text-right">' . $review->get_review_date() . '</div>';
                echo "</div>";
                echo "<div class=\"review-body\">";
                echo "<div class='row'>";
                echo "
        <div class=\"col-sm-3 col-xs-4 text-center\">
            <div class=\"col\">
                <span id=\"b2b-rating\" class=\"green-bg white text-3 w-600 sm-pad-2\">" . $review->star_count() . "</span>
            </div>
        </div>";
                echo "
        <div class='col-sm-9 col-xs-8'>
        ";
                echo '<p>' . ucfirst($review->review_text_moderated) . '</p>';
                echo '<hr>';
                echo '<small><span class="block text-1 w-500 benton">' . $review->first_name . ' ' . substr($review->last_name,0,1) . '.</span>' . $review->title . '</small>';
                echo "</div>"; //col-sm-9
                echo "</div>"; // row

                echo "</div>"; // panel-body
                echo "</div>"; // col-12
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