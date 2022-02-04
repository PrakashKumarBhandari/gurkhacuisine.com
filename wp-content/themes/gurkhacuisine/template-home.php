<?php

/* Template Name: Home 

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
$theme_options = get_option( 'theme_settings' );
?>


<!--slider section start-->
<div class="slider-container">
    <?php 
	global $post;
	$args = array('posts_per_page' => -1, 'post_type' => 'slider');
	$myposts = get_posts($args);     
	?>

    <!-- Slider Image -->
    <div id="mainSlider" class="nivoSlider slider-image theme-dark">
        <?php
			$counter_img = 1;
            foreach ($myposts as $key => $post) :
                //the_post_thumbnail( 'slider_image',['title' => '#htmlcaption'.$counter_img]);
                echo"<img src='".get_the_post_thumbnail_url(get_the_ID(),'slider_image')."' title='#htmlcaption".$counter_img."'>";
                $counter_img++;
                ?>
               
            <?php
			endforeach;
            ?>            
    </div>
    <!-- Slider Caption 1 -->
    <?php
	$counter = 1;
	foreach ($myposts as $key => $post) :
		setup_postdata($post);
		$option_1 = get_post_meta(get_the_ID(), 'slider_option1', true);
		$option_2 = get_post_meta(get_the_ID(), 'slider_option2', true);
		$option_3 = get_post_meta(get_the_ID(), 'slider_option3', true);
		$option_4 = get_post_meta(get_the_ID(), 'slider_option4', true);
	?>
    <div id="htmlcaption<?php echo $counter;?>" class="nivo-html-caption slider-caption-<?php echo $counter;?>">
        <div class="slider-text-table">
            <div class="slider-text-tablecell">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 d-lg-block d-md-block d-none">
                            <div class="social-media-follow">
                                <div class="social-box-inner">
                                    <ul>
                                        <li><a href="<?php echo $theme_options['facebookurl'];?>"><i
                                                    class="mdi mdi-facebook"></i></a></li>
                                        <li><a href="<?php echo $theme_options['twitterurl'];?>"><i
                                                    class="mdi mdi-twitter"></i></a></li>
                                        <li><a href="<?php echo $theme_options['instaurl'];?>"><i
                                                    class="mdi mdi-instagram"></i></a></li>
                                        <li><a href="<?php echo $theme_options['tripadvisor'];?>"><i
                                                    class="fa fa-tripadvisor"></i></a></li>

                                    </ul>
                                </div>
                                <p>follow on</p>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9">
                            <div class="slide<?php echo $counter;?>-text">
                                <div class="middle-text">
                                    <div class="title-1 wow rotateInDownRight" data-wow-duration="0.9s"
                                        data-wow-delay="0s">
                                        <h2><?php echo $option_1;?></h2>
                                    </div>
                                    <div class="title-2 wow bounceInRight" data-wow-duration="1.2s"
                                        data-wow-delay="0.2s">
                                        <h1><?php echo get_the_title(); ?></h1>
                                    </div>
                                    <div class="desc wow slideInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
                                        <p><?php echo get_the_content(); ?></p>
                                    </div>
                                    <?php if(isset($option_2) && !empty($option_2)){
											?>
                                    <div class="order-now wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <a href="<?php echo $option_3;?>"><?php echo $option_2;?></a>
                                    </div>
                                    <?php
									} 
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <?php
	$counter++;
	endforeach;
	wp_reset_postdata();
    ?>
    
</div>
<!--slider section end-->
 
<!--Home about section start-->
<div class="home-about white-bg ptb-100">
    <div class="container">
        <?php 
		$pageID = 25;
        $about = new WP_Query('page_id='.$pageID);        
		while ( $about->have_posts() ) : $about->the_post();
		?>
        <div class="row">
            <div class="col-md-6">
                <div class="welcome-about">
                    <h2 class="title_1"><?php the_title(); ?></h2>
                    <?php if( get_field('sub_heading') ): ?>
                    <h3 class="title_2"><?php the_field('sub_heading'); ?></h3>
                    <?php endif; ?>
                    <?php if( get_field('about_us_home_display_text') ){
                        echo "<p class='text1'>".get_field('about_us_home_display_text')."</p>";
                    }
                    else{
                        echo "<p class='text1'>".wp_trim_words(get_the_content(),300,'...')."</p>";
                    }
                     ?>
                    <div class="read-more">
                        <a href="<?php echo the_permalink() ?>">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="welcome-about-img">
                    <?php 
                    if( get_field('about_us_home') ): 
                        $url_image = get_field('about_us_home');
						  // $url_image['sizes']['about_us_home']
                        echo"<img src='".$url_image['sizes']['home_about_image']."' >";
                    else:                        
						if (has_post_thumbnail()) {
						the_post_thumbnail('home_about_image',['class'=>'about_us_home_image']);
                        }
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <?php 
		endwhile;
		?>
    </div>
</div>
<!--Home about section end-->
<!--popular dises start-->
<?php
// args
$args_menu = array(
    'posts_per_page' => -1,
    'post_type' => 'post-menu'
);
// query
$the_query_menu = new WP_Query($args_menu);
$count_menu = $the_query_menu->post_count;       
?>
<div class="popular-dishes">
    <div class="bg-img-2 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title popular-section-title text-center grey_bg">
                        <h2>Our Popular Dishes</h2>
                        <p> Our customer's must liked dishes, We believe in customer choice and recommandaton.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="dises-show text-center">
                                    <div class="row dises-list">
                                        <?php
                                          $count_popular = 0;
                                          while ($the_query_menu->have_posts()) : $the_query_menu->the_post();
                                          if (have_rows('menu_fields')):
                                            //$menu = 0;
                                            
                                            while (have_rows('menu_fields')): the_row();
                                                // $title = get_sub_field('title');
                                                // $description = get_sub_field('description');
                                                // $image_special = get_sub_field('special_sign');
                                                $is_popular = get_sub_field('popular');

                                            if($is_popular == true){										
/*
											if($count_popular%3==0 && $count_popular>2 ){
												echo"</div></div><div class='dises-show text-center'><div class='row'>";
											} */
										?>
                                        <div
                                            class="col-lg-4 col-md-6 <?php if($count_popular%3==0){ echo"d-lg-block d-md-none d-block";}?>">

                                            <div class="single-disesh">

                                                <div class="disesh-img">
                                                    <?php 
                                                $featured_image = get_sub_field('featured_image');
                                                if (!empty($featured_image['url'])):
                                                ?>
                                                <img src="<?php echo $featured_image['sizes']['popular_dish']; ?>">
                                                <?php
                                                else:
                                                 echo'<img src="'.get_template_directory_uri().'/images/dish/1.png" >';
                                                endif; 
                                                ?>
                                                </div>
                                                <div class="disesh-desc pt-50">
                                                    <h3><?php the_sub_field('title'); ?></h3>
                                                    <p class="price"><?php the_sub_field('price'); ?></p>
                                                </div>
                                                <p class="menu-item-detail-fea"><?php $str_desc = strlen(utf8_decode(get_sub_field('description'))); 
                                                echo substr(get_sub_field('description'),0,63);  if($str_desc>63){echo'...'; } ?></p>
                                            </div>
                                        </div>
                                        <?php 
                                                $count_popular++;
                                                }
                                            endwhile;
                                        endif;
                                        endwhile;
										?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--popular dises end-->

<!--reservation section start-->
<div class="reservation ptb-100 white-bg">
    <div class="bg-img-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title white_bg mb-50 text-center">
                        <h2 class="mb-50">Make A Reservation</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="reserv-section-inner">
                        <div class="bg-img"></div>
                        <div class="reserve-form">
                            <h3 class="reserv-title mb-15">Request Booking</h3><br/>
                            <?php //echo do_shortcode('[online_restaurant_reservation]');?>
                            <br />
                            <p class="text-center">Any reservation made for same day we strongly advise to call restaurant number on
                                ‎020 8778 3322 </p>
                            <div class="contact-form-box">
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
                                    <div class="form-group col-md-4 reserve-name">
                                        <input type="text" class="form-control form-control-lg"  name="name"
                                            id="name" placeholder="Your Name *" required>
                                        <div class="invalid-feedback">
                                            Please enter your full name.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 reserve-email">
                                        <input type="email" name="email" class="form-control form-control-lg" id="email"
                                            placeholder="Your Email *" required>
                                            <div class="invalid-feedback">
                                            Please your valid email.
                                        </div>
                                    </div>
                                    <div class="form-group has-error col-md-4 reserve-phone">
                                        <input type="text" name="phone" class="form-control form-control-lg" id="phone"
                                            placeholder="Phone Number *" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  has-error col-md-4 reserve-date">
                                        <input type="text" name="date" id="date_calender"
                                            class="form-control form-control-lg" data-date-format="yyyy-mm-dd"
                                            placeholder="Date *" required>

                                    </div>
                                    <div class="form-group col-md-4 reserve-time">
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
                                            <option value="">Choose time * </option>
                                            <?php 
                                            foreach ($timeArr as $time) {
                                                echo '<option value="' . $time . '">' . $time . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 reserve-persons">
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
                                    <div class="form-group col-md-12 reserve-submitphone mb-20 text-center">
                                        <button type="submit" id="place_reservation"
                                            class="button large ">Book Now</button>
                                    </div>
                                </div>
                            </form>    
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--reservation section end-->
<!--Food menu section start-->
<div class="food-menu food-menu-bg ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-title mb-50 text-center white_bg">
                    <h2 class="mb-50">Our Food Menu</h2>
                    <p> The Gurkha’s restaurant has been have made it a priority to bring these qualities by serving our
                        customers for the last fourteen years.We invite you to dine in our restaurant or alternatively
                        try our home delivery & take-away services.</p>
                </div>
            </div>
        </div>

        <div class="food-item-tab home-page row">

            <div class="col-lg-12">
                <div class="food-item-desc">
                    <div class="tab-content">
                    <div class="row">
                        <?php 
                        $cat_count_list = 1;
                        $featured_count = 0;
                        while ($the_query_menu->have_posts()) : $the_query_menu->the_post();
                        //$excerpt = excerpt(100);							
                        ?>                       
                        
                            <?php
                                    if (have_rows('menu_fields')):
                                    $menu = 0;
                                    while (have_rows('menu_fields')): the_row();
                                        $title = get_sub_field('title');
                                        $description = get_sub_field('description');
                                        $image_special = get_sub_field('special_sign');
                                        $is_featured = get_sub_field('featured');

                                        if($is_featured == true){
                                           
                                            if($featured_count%2== 0){  echo"<div class='clearfix'></div>"; }
                                        
                                    ?>
                                    <div class="col-md-6">
                                        <div class="fooder-menu-description ">
                                            <div class="single-food-item mb-30">
                                                <div class="single-food-inner">
                                                    <?php 
                                                    
                                                    $featured_image = get_sub_field('featured_image');
                                                    if (!empty($featured_image['url'])):
                                                        ?>
                                                    <div class="food-img">
                                                        <!-- <img src="< ?php echo $featured_image['url']; ?>"> -->
                                                        <img src="<?php echo $featured_image['sizes']['menu_thumb_image']; ?>">
                                                    </div>
                                                    <?php
                                                    endif; 
                                                    
                                                    ?>
                                                    <div class="<?php  if (!empty($featured_image['url'])){ echo"single-food-item-desc";}else{echo"single-food-item-desc-no-image";}?>">
                                                        <div class="single-food-item-title">
                                                            <h2><?php the_sub_field('title'); ?></h2>
                                                            <p>
                                                                <?php 
                                                                        $image_special = get_sub_field('special_sign');
                                                                        if (!empty($image_special['url'])):
                                                                        ?>
                                                                <img src="<?php echo $image_special['url']; ?>"
                                                                    style="display: inline !important;">
                                                                <?php
                                                                        endif; 
                                                                    ?>
                                                            </p>
                                                            <p><?php the_sub_field('description'); ?></p>
                                                        </div>
                                                        <div class="single-food-price">
                                                            <p><?php the_sub_field('price'); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                        $featured_count++;
                                        }
                                    $menu++;
                                    endwhile;
                                    endif;
                                    ?>
                        
                       
                        <?php
                        $cat_count_list++;
                        endwhile; 
                        ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="food-item-desc menu-notes content-center">
                <div class="text-center view-all-menu">                    
                    <a href="<?php echo site_url('/full-menu');?>"  class="button  ">View All Menu</a>
                </div>
                <p><strong>Note:</strong> If you have any food allergies, Please speak to a member of our team
                    who will be happy to help with your query.</p>
            </div>
        </div>
    </div>
</div>
<!--Food menu section end-->


<!--Tstimonial section start-->
<div class="testimonial ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-title white_bg mb-50 text-center">
                    <h2 class="mb-50">Our Client Loves</h2>
                    <p>Our customers believe about our services.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-sliders">
                    <?php 
                    global $post;
                    $args = array('posts_per_page' =>-1, 'post_type' => 'testimonial');
                    $my_testemonial = get_posts($args);    
                    ?>

                    <div class="row">
                        <div class="testimonial-image-slider text-center"> </div>
                        <div class="col-lg-10 offset-lg-1">
                            <div class="testimonial-text-slider text-center mt-30">
                                <?php 
								foreach ($my_testemonial as $key => $post) :
								setup_postdata($post);
								$op_1 = get_post_meta(get_the_ID(), 'option_2', true);
								?>
                                <div class="single-test-text">
                                    <p class="text-qoute">
                                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                                    </p>
                                    <p class="test-text"><?php the_content();?></p>
                                    <div class="test-title mb-50">
                                        <h4><?php the_title();?></h4>
                                        <p><?php echo $op_1;?></p>
                                    </div>
                                </div>
                                <?php
								endforeach;
								wp_reset_postdata();
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Tstimonial section end-->




<?php
//get_sidebar();
get_footer();