<div class="wrap">
    <h2>Categories</h2>
    <a href="<?php echo home_url(); ?>/wp-admin/admin.php?page=b2b_categories_edit">Add New</a>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">
                    <form method="post">
                        <?php
                        $this->b2b_CategoryScreenList->prepare_items();
                        $this->b2b_CategoryScreenList->display();
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <br class="clear">
    </div>
</div>