<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

/* Template Name: Booking

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

//echo GOOGLE_SITE_KEY; exit;
?>
<!--Breadcrubs start-->
<div class="breadcrubs"
    <?php if(get_field('background_image')):  ?>style="background:url('<?php echo $bg_image_url;?>') no-repeat scroll center center / cover!important;"
    <?php endif;?>>
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

    <div class="contact-bottom-section ptb-100">
        <div class="bg-img"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-form mr-10 contact-form-div">
                        <div class="contact-form-title">
                            <h2>Reserve Table </h2>
                        </div>
                        <div class="contact-form-box">
                            <p>Same day bookings after 6pm: Please kindly call the restaurant on 0208 778 3322 or 3222
                            </p>
                            <div id="success_msg" class="alert alert-success" style="display:none" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-cutlery"></i><strong> Success!</strong> Reservation Request Sent
                                Successfully.
                            </div>
                            <div id="error_msg" class="alert alert-danger" style="display:none" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i
                                    class="fa fa-coffee"></i> <strong>Sorry!</strong> Message Not Sent, Please try
                                again.
                            </div>
                            <form action="" method="post" class="reservation-form" novalidate>
                                <div class="form-row">
                                    <div class="form-group col-md-6 reserve-name">
                                        <input type="text" class="form-control form-control-lg"  name="name"
                                            id="name" placeholder="Your Name *" required>
                                        <div class="invalid-feedback">
                                            Please enter your full name.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 reserve-email">
                                        <input type="email" name="email" class="form-control form-control-lg" id="email"
                                            placeholder="Your Email *" required>
                                            <div class="invalid-feedback">
                                            Please your valid email.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  has-error col-md-6 reserve-date">
                                        <input type="text" name="date" id="date_calender"
                                            class="form-control form-control-lg" data-date-format="yyyy-mm-dd"
                                            placeholder="Date *" required>

                                    </div>
                                    <div class="form-group col-md-6 reserve-time">
                                        <?php 
                                        $timeArr = array(
                                            "4:00 PM",
                                            "4:15 PM",
                                            "4:30 PM",
                                            "4:45 PM",
                                            "5:00 PM",
                                            "5:15 PM",
                                            "5:30 PM",
                                            "5:45 PM",
                                            "6:00 PM",
                                            "6:15 PM",
                                            "6:30 PM",
                                            "6:45 PM",
                                            "7:00 PM",
                                            "7:15 PM",
                                            "7:30 PM",
                                            "7:45 PM",
                                            "8:00 PM",
                                            "8:15 PM",
                                            "8:30 PM",
                                            "8:45 PM",
                                            "9:00 PM",
											"9:15 PM",
											"9:30 PM",
											"9:45 PM",
											"10:00 PM",
											"10:15 PM",
											"10:30 PM",
											"10:45 PM",
											"11:00 PM",
											"11:15 PM",
											"11:30 PM"
                                        );
                                        ?>
                                        <select name="time" id="time" class="form-control form-control-lg" required>
											<option value="" disabled selected>&#9;Choose time * </option>
                                            <?php 
                                            foreach ($timeArr as $time) {
                                                echo '<option value="' . $time . '">' . $time . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group has-error col-md-6 reserve-phone">
                                        <input type="text" name="phone" class="form-control form-control-lg" id="phone"
                                            placeholder="Phone Number *" required>
                                    </div>
                                    <div class="form-group col-md-6 reserve-persons">
                                        <input type="number" min="1" id="person" name="person"
                                            class="form-control form-control-lg" placeholder="No of Persons *" required>
                                    </div>
                                </div>
                                        
                                <div class="form-row">
                                    <div class="form-group  col-md-12 reserve-checkbox">
                                        <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            &nbsp; Agree to <a href="<?php echo site_url('/privacy-policy');?>"
                                                target="_blank">terms and conditions</a>
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                                <div class="form-row">
                                    <div class="form-group col-md-12 reserve-submitphone text-center">
                                    <button type="submit" id="place_reservation_inner" class="button large ">Book Now</button>
                                    </div>
                                </div>
                            </form>                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="contact-map" class="map-area ml-10">
                        <div class="open-list booking-open-list">
                            <div class="contact-form-box pt-70">
                                <div class="card mr-15">
                                    <div class="card-header" id="headingOne">
                                        <h4 class="card-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Gurkha Restaurant Open Hours
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion"
                                        aria-labelledby="headingOne">
                                        <div class="card-body"><p>
											<?php echo($theme_options['openhour'] ); ?>
											</p>
                                            
                                           
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="contact-form-box mtb-20 ptb-10 ">                                
                                <?php                                	
                                if ( have_posts() ) :
                                while ( have_posts() ) :
                                the_post();
                                the_content();
                                endwhile;
                                endif; 
                                ?>
                            </div>
                        </div>
                        <!-- <div id="googleMap"><iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d39803.84311157248!2d-0.051126!3d51.426199!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x954d112b50130f86!2sGurkha%20Restaurant!5e0!3m2!1sen!2suk!4v1592680576576!5m2!1sen!2suk"
                                width="100%" height="363" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact bottom section end-->
    <div class="contact-information text-center ptb-10 mb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-contact-information">
                        <div class="contact-icon">
                            <a href="#"><i class="mdi mdi-phone"></i></a>
                        </div>
                        <p><?php echo($theme_options['contact_number'] ); ?></p>
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
                        <p><?php echo($theme_options['contact_address'] ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>
<!--contact us pages end-->

<script>

</script>
<?php
//get_sidebar();
get_footer();