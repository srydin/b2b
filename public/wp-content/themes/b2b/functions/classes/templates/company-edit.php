<?php
    $obj = $_GET['obj'] ?? '';
    $is_edit = ($obj ? true : false);
    // check for nonce & verify
    if ($is_edit && !wp_verify_nonce($_GET['_wpnonce'], 'sp_obj')){
        wp_die('Action failed.');
    }

    // setup the page
    $company = new Company();
    $company_items = Company::$db_columns;

    if (!empty($obj)){
        $company = $company->find_by_id((int) $obj);
    }



    if ($_POST){
        // MERGE attributes
        $post_names = array_keys($_POST);
        foreach ($_POST as $name => $value){
            if (in_array($name,$post_names)){
                $company->$name = $value;
            }
        }

        $company->merge_attributes();
        $result = $company->save();
        if ($result > 0){
            create_b2b_notice('Company info saved successfully.', 'notice');
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

    <h1 id="wphead"><?php
        if(!empty($obj)){
            echo "Edit Company (ID: $obj)";
        }
        else{
            echo esc_html( get_admin_page_title() );
            }
            ?>
    </h1>
        <a class="clear" href="/wp-admin/admin.php?page=companies">Back to all companies</a>

    <form method="post">
        <table class="form-table">
            <style>
                .form-control {min-width: 400px;}
            </style>
            <tbody>
                <?php
                foreach ($company_items as $item){
                    $item_pretty = str_replace('_', ' ', $item);
                    if ($item === 'id'){
                        continue;
                    } // skip ID - not editable directly
                    echo "<tr>";
                        echo "<th>" . ucwords($item_pretty) . "</th>";
                        echo "<td>" . $company->get_company_input_callback($item) . "</td>";
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