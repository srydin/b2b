s<?php
    $obj = $_GET['obj'] ?? '';
    $is_edit = ($obj ? true : false);
    // check for nonce & verify
    if ($is_edit && !wp_verify_nonce($_GET['_wpnonce'], 'sp_obj')){
        wp_die('Action failed.');
    }

    // setup the page
    $category = new Category();
    $category_items = Category::$db_columns;



    if (!empty($obj)){
        $category = $category->find_by_id((int) $obj);
    }
    $message = [];
    if ($_POST){
        // MERGE attributes
        $post_names = array_keys($_POST);
        foreach ($_POST as $name => $value){
            if (in_array($name,$post_names)){
                $category->$name = $value;
            }
        }
        $category->merge_attributes();
        $result = $category->save();
        if ($result > 0){
            create_b2b_notice('Category info saved successfully.', 'notice');
        }
        elseif($result === 0){
            create_b2b_notice('Nothing saved.', 'notice');
        }
        else{
            create_b2b_notice('Something went wrong.', 'warning');
        }
    }

    ?>
    <div class="wrap">
        <?php
        display_theme_notices();
        ?>
    <h1><?php
        if(!empty($obj)){
            echo "Edit Category (ID: $obj)";
        }
        else{
            echo esc_html( get_admin_page_title() );
            }
            ?></h1>
    <?php //var_dump($category);
    ?>
        <a href="/wp-admin/admin.php?page=b2b_categories">Back to all categories</a>

        <form method="post">
        <table class="form-table">
            <tbody>
                <?php
                foreach ($category_items as $item){
                    if ($item === 'id'){
                        continue;
                    } // skip ID - not editable directly

                    elseif ($item === 'description'){

                        echo "<tr>";
                        echo "<th>" . ucwords($item) . "</th>";
                        $input = "";

                        echo "<td><textarea rows='5' id=\"category_data_" . wp_unslash(esc_html($item)) ."\" name=\"$item\" type=\"text\">" . esc_html($category->$item) . "</textarea></td>";
                        echo "</tr>";
                        continue;
                    } // handle category description

                    echo "<tr>";
                        echo "<th>" . ucwords($item) . "</th>";
                        $input = "";

                    echo "<td><input id=\"category_data_" . wp_unslash(esc_html($item)) ."\" name=\"$item\" type=\"text\" value=\"" . esc_html($category->$item) . "\"></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <p class="submit">
            <input class="button button-primary" type="submit" value="Save">
        </p>
    </form>
</div>