<div class="row">
    <div class="col-md-12">
    <?php
    $company_id = get_query_var('company_id','0');
    $reviews = new Review(['company_id' => $company_id]);
    $reviews_arr = $reviews->published_reviews_by_company_id();
    if (!empty($reviews_arr)){
        foreach ($reviews_arr as $review){
            // todo maybe include some kind of template file
            echo $review['first_name'] . ' ';
            echo $review['last_name'] . "<br>";
            echo '<p>' . $review['review_text_moderated'] . '</p>';
        }
    }
    else {
        echo 'No reviews... yet.';
    }
    // todo add company name?
    echo "<h2>Leave a review</h2>";

    // todo create modal?
    echo $reviews->review_form();
    ?>
    </div>
</div>
