<div class="row">
    <div class="col-md-12">
    <?php
    $company_name = get_query_var('company_name');
    echo "<h2 class='h2'>$company_name Reviews</h2>";
    $company_id = get_query_var('company_id','0');
    $reviews = new Review(['company_id' => $company_id]);
    $reviews_arr = $reviews->published_reviews_by_company_id();
    if (!empty($reviews_arr)){
        foreach ($reviews_arr as $review){
            $output = "";
            $output .= "<div class='row'>";
            $output .= "<div class='col-md-6'>";
            $output .= $review['first_name'];
            $output .= "</div>";
            $output .= "<div class='col-md-6'>";
            $output .= $review['last_name'];
            $output .= "</div>";
            $output .= "<div class='col-md-12'>";
            $output .= $review['review_text_moderated'];
            $output .= "</div>";
            $output .= "</div>";
            echo $output;
        }
    }
    else {
        echo 'No reviews... yet.';
    }

    // todo add company name?
    $company = new Company();
    echo "<h2 class='h2'>Leave a review</h2>";

    // todo create modal?
    $reviews = new Review(['company_id' => $company_id]);
    echo $reviews->review_form();
    ?>
    </div>
</div>
