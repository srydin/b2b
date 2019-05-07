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
    $message = [];
    if ($_POST){
        // MERGE attributes
        $post_names = array_keys($_POST);
        foreach ($_POST as $name => $value){
            if (in_array($name,$post_names)){
                $company->$name = $value;
            }
        }
        $company->merge_attributes();
        $company->save();
        $redirect = "/wp-admin/admin.php?page=companies";
        echo "<script type='text/javascript'>location.replace(\"$redirect\")</script>";
        exit;
    }

    ?>
    <div class="wrap">

    <h1><?php
        if(!empty($obj)){
            echo "Edit Company (ID: $obj)";
        }
        else{
            echo esc_html( get_admin_page_title() );
            }
            ?></h1>
    <?php //var_dump($message); ?>
    <form method="post">
        <table class="form-table">
            <tbody>
                <?php
                foreach ($company_items as $item){
                    if ($item === 'id'){
                        continue;
                    } // skip ID - not editable directly
                    echo "<tr>";
                        echo "<th>" . ucwords($item) . "</th>";
                        echo "<td><input id=\"company_data_" . wp_unslash(esc_html($item)) ."\" name=\"$item\" type=\"text\" size=\"40\" value=\"" . wp_unslash(esc_html($company->$item)) . "\"></td>";
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