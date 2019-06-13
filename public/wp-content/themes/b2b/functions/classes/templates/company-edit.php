<script>
    jQuery(document).ready(function(){
        jQuery("#clear_logo").click(function(){
            jQuery("#logoURL").val("");
            jQuery("#company_info").submit();
        });
    });
</script>
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

    <form id="company_info" method="post" enctype="multipart/form-data">
        <table class="form-table">
            <style>
                .form-control {min-width: 400px;}
            </style>
            <tbody>
                <?php
                $company_items = $company::$db_columns;
                foreach ($company_items as $item){
                    $item_pretty = str_replace('_', ' ', $item);
                    $item_pretty = str_replace('URL', '', $item_pretty);
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