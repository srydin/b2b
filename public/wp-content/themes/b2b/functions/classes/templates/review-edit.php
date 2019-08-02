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
        }
        $review->merge_attributes();
        $review->save();
        echo "<script type='text/javascript'>location.replace(\"$redirect\")</script>";
        exit;
    }

    ?>
    <script>
        function reason_required() {
            var noPublishSelect = document.getElementById("reviewStatus");
            if (noPublishSelect.value == 'no_publish'){
                document.getElementById("noPublishReason").required = true;
            }
        }
    </script>
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

                    $item_pretty = str_replace('_', ' ',$item);

                    if ($item === 'id' || $item === 'name'){
                        continue;
                    } // skip ID - not editable directly

                    if ($item === 'status'){
                        echo "<tr>";
                        echo "<th>Status</th>";
                        echo "<td><select id='reviewStatus' onchange=\"reason_required()\" name='status'>";
                        foreach (Review::STATUS_TYPES as $status){
                            $checked = ($review->status == $status) ? ' selected' : '';
                            echo "<option value=\"$status\"$checked>$status</option>";
                        }
                        echo "</select></td>";
                        echo "</tr>";
                        continue;
                    }

                    if ($item === 'no_publish_reason'){
                        echo "<tr id='nopublishrow'>";
                        echo "<th>No Publish Reason</th>";
                        echo "<td><select id='noPublishReason' name='no_publish_reason'>";
                        echo "<option value=\"\">Select a reason (if no_publish)</option>";
                        $i = 1;
                        foreach (Review::NO_PUBLISH_REASONS as $reason){
                            $checked = ($review->no_publish_reason == $i) ? ' selected' : '';
                            echo "<option value=\"$i\"$checked>$reason</option>";
                            $i++;
                        }
                        echo "</select></td>";
                        echo "</tr>";
                        continue;
                    }


                    if ($item === 'review_text_unmoderated'){
                        echo "<tr>";
                        echo "<th>" . ucwords($item_pretty) . "</th>";
                        echo "<td><textarea name='review_text_unmoderated' type='textarea' readonly rows='3'>$review->review_text_unmoderated</textarea></td>";
                        echo "</tr>";
                        continue;
                    }

                    if ($item === 'review_text_moderated'){

                        echo "<tr>";
                        echo "<th>" . ucwords($item_pretty) . "</th>";
                        echo "<td height='40px'><textarea name='review_text_moderated' type='textarea' rows='3'>$review->review_text_moderated</textarea></td>";
                        echo "</tr>";
                        continue;

                    } // skip ID - not editable directly

                    echo "<tr>";
                        echo "<th>" . ucwords($item_pretty) . "</th>";
                        echo "<td><input class='regular-text' type='text' placeholder='" . $review->$item . "' value='" . $review->$item . "' readonly></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <p class="submit">
            <input class="button button-primary" type="submit" value="Moderate"> or
            <a href="/wp-admin/admin.php?page=manage_reviews">Back to list</a>
        </p>
    </form>
</div>