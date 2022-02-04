<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gurkhacuisine
 */
$theme_options = get_option( 'theme_settings' );
?>

<!--Footer section start-->
<div class="footer">
    <div class="footer-top ptb-100 grey-bg">
        <div class="container">
            <div class="row">
                <?php 
                $pageID = 25;
                $about = new WP_Query('page_id='.$pageID);        
                while ( $about->have_posts() ) : $about->the_post();
                ?>

                <div class="col-lg-4 col-md-6">
                    <div class="single-footer pr-10">
                        <div class="footer-logo">
                            <img src="<?php echo get_template_directory_uri();?>/images/logo/logo.png" alt="logo">
                        </div>
                        <div class="single-footer-details mt-30">
                            <p class="addresses">
                            <?php if( get_field('footer_display_short_text') ):  
                             the_field('footer_display_short_text');
                            endif;
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php 
                endwhile;
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer">
                        <h3 class="single-footer-title">Open Hours</h3>
                        <div class="single-footer-details mt-30">
                            <p class="addresses">
                            <?php echo($theme_options['openhour'] ); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer instagram">
                        <h3 class="single-footer-title">Contact Us</h3>
                        <div class="single-footer-details mt-30">
                            <?php echo($theme_options['contactus'] ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center ptb-20 white-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <p class="pull-left">Copyright &copy; Gurkhas 2014. All Rights Reserved.</p>
                </div>
				 <div class="col-lg-6 col-md-6 col-sm-12">
                    <p class="pull-right">Developed by <a href="http://www.rsdesignuk.com/">RS Design Uk</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="alert-cookie animated fadeInDown text-center">
        <div class="alert alert-warning " style="margin-bottom:0px" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i
                class="fa fa-diamond"></i>
            <span>This website uses cookies. By using our website you consent to all cookies in accordance with our
            </span><a href="<?= esc_url( home_url( '/privacy-policy' ) ) ?>"> Privacy Policy</a>
            <a style="cursor:pointer;" id="acceptcookie" class="btn btn-primary btn-cookie accept-cookie">Ok</a>
        </div>

    </div>
</div>

<!--Footer section end-->
</div>
<!-- Body main wrapper end -->

<?php wp_footer(); ?>
<!-- <script
    src='http://localhost/gurkha/wp-content/plugins/online-restaurant-reservation/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'>
</script>
<script src='http://localhost/gurkha/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script src='http://localhost/gurkha/wp-includes/js/jquery/ui/datepicker.min.js?ver=1.11.4'></script> -->


</body>

</html>