<?php
// buyers guide
if ( is_page_template('template-buyers-guides.php') ){ ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bootstrap.min.js"></script>
    <script>
        $("#cta-fixed").hide();
        $(document).scroll(function() {
            var y = $(this).scrollTop();
            if (y > 2400) {
                $('#cta-fixed').fadeIn();
            } else {
                $('#cta-fixed').fadeOut();
            }
        });
    </script>
<?php
} // buyers guide


if ( is_single() ){ ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bootstrap.min.js"></script>
    <script>
        $("#cta-fixed").hide();
        $(document).scroll(function() {
            var y = $(this).scrollTop();
            if (y > 1200) {
                $('#cta-fixed').fadeIn();
            } else {
                $('#cta-fixed').fadeOut();
            }
        });
    </script>

<?php } // is single
?>