<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

/* Template Name: Contact

 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gurkhacuisine
 */

get_header();


if(get_field('background_image')): 
    $bg_image_url = get_field('background_image');   
endif;

$theme_options = get_option( 'theme_settings' );
?>
<!--Breadcrubs start-->
<div class="breadcrubs" <?php if(get_field('background_image')):  ?>style="background:url('<?php echo $bg_image_url;?>') no-repeat scroll center center / cover!important;" <?php endif;?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcurbs-inner text-center">
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrubs end-->
<!--contact us pages start-->
<div class="contact-us">
    <div class="contact-information text-center ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-contact-information">
                        <div class="contact-icon">
                            <a href="#"><i class="mdi mdi-phone"></i></a>
                        </div>
                        <?php echo($theme_options['contact_number'] ); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-contact-information">
                        <div class="contact-icon">
                            <a href="#"><i class="mdi mdi-email"></i></a>
                        </div>
                        <p><?php echo($theme_options['contact_email'] ); ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-contact-information">
                        <div class="contact-icon">
                            <a href="#"><i class="mdi mdi-map-marker"></i></a>
                        </div>
                        <?php echo($theme_options['contact_address'] ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact bottom section-->
    <div class="contact-bottom-section ptb-100">
        <div class="bg-img"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 contact-form-div">
                    <div class="contact-form">
                        <div class="contact-form-title">
                            <h2>Get In Touch</h2>
                        </div>
                        <div class="contact-form-box">
                            <?php echo do_shortcode('[contact-form-7 id="58" title="Contact form 1"]');?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 map-div">
                    <div id="contact-map" class="map-area">
                        <div id="googleMap" style="width:100%;height:580px;"><iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d39803.84311157248!2d-0.051126!3d51.426199!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x954d112b50130f86!2sGurkha%20Restaurant!5e0!3m2!1sen!2suk!4v1592680576576!5m2!1sen!2suk"
                                width="600" height="558" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact bottom section end-->

</div>
<!--contact us pages end-->


<?php
//get_sidebar();
get_footer();