<?php

    $obj = $_GET['obj'] ?? '';
    $redirect = "/wp-admin/admin.php?page=manage_reviews";

    if (empty($obj)){
        echo "<script type='text/javascript'>location.replace(\"$redirect\")</script>";
    }

    $is_edit = ($obj ? true : false);
    // check for nonce & verify
    if ($is_edit && !wp_verify_nonce($_GET['_wpnonce'], 'sp_obj')){
        wp_die('Action failed.');
    }

    // setup the page
    $review = new Review();
    $review_items = Review::$db_columns;



    if (!empty($obj)){
        $review = $review->find_by_id((int) $obj);

        if (empty($review->review_text_moderated)){
            $review->review_text_moderated = $review->review_text_unmoderated;
        }

    }
    $message = [];
    if ($_POST){
        // MERGE attributes
        $post_names = array_keys($_POST);
        foreach ($_POST as $name => $value){
            if (in_array($name,$post_names)){
                $review->$name = $value;
            }
            // todo create a picklist in the edit screen and introduce nopublish
            $review->status = 'published';
        }
        $review->merge_attributes();
        $review->save();
        echo "<script type='text/javascript'>location.replace(\"$redirect\")</script>";
        exit;
    }

    ?>
    <div class="wrap">

    <h1><?php
        if(!empty($obj)){
            echo "Moderate Review (ID: $obj)";
        }
        else{
            echo esc_html( get_admin_page_title() );
            }
            ?></h1>
        <a href="/wp-admin/admin.php?page=manage_reviews">Back to all reviews</a>
        <?php //var_dump($message); ?>
    <form method="post">
        <table class="form-table">
            <tbody>
                <?php
                foreach ($review_items as $item){
                    if ($item === 'id'){
                        continue;
                    } // skip ID - not editable directly

                    if ($item === 'review_text_unmoderated'){
                        echo "<tr>";
                        echo "<th>" . ucwords($item) . "</th>";
                        echo "<td><textarea name='review_text_unmoderated' type='textarea' readonly rows='3'>$review->review_text_unmoderated</textarea></td>";
                        echo "</tr>";
                        continue;

                    }

                    if ($item === 'review_text_moderated'){

                        echo "<tr>";
                        echo "<th>" . ucwords($item) . "</th>";
                        echo "<td height='40px'><textarea name='review_text_moderated' type='textarea' rows='3'>$review->review_text_moderated</textarea></td>";
                        echo "</tr>";
                        continue;

                    } // skip ID - not editable directly

                    echo "<tr>";
                        echo "<th>" . ucwords($item) . "</th>";
                        echo "<td>" . $review->$item . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <p class="submit">
            <input class="button button-primary" type="submit" value="Publish"> or 
            <a href="/wp-admin/admin.php?page=manage_reviews">Back to list</a>
        </p>
    </form>
</div>