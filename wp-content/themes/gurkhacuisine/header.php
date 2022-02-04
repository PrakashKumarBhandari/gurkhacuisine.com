<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gurkhacuisine
 */
$theme_options = get_option( 'theme_settings' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://www.fbgcdn.com/embedder/js/ewm2.js" defer async></script>
	
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/images/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri();?>/images/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri();?>/images/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri();?>/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri();?>/images/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri();?>/images/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

	
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <!-- Pre Loader
	============================================ -->
    <div class="preloader">
		<div class="loading-center">
			<div class="loading-center-absolute">
				<div class="object object_one"></div>
				<div class="object object_two"></div>
				<div class="object object_three"></div>
			</div>
		</div>
	</div>
    <!-- Body main wrapper start -->
    <div class="wrapper white-bg">
        <!--Header section start-->
        <div class="copyright ptb-10 top-contact-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 text-left">
                        <div class="top-contact-info">
                            <?php echo $theme_options['topleft'];?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-right top-right-area">
                        <div class="social-icon-top">
                            <ul>
                                <?php 
                                if(isset($theme_options['facebookurl'])&& !empty($theme_options['facebookurl'])){
                                ?>
                                <li><a href="<?php echo $theme_options['facebookurl'];?>"><i class="mdi mdi-facebook"
                                            aria-hidden="true"></i></a></li>
                                <?php
                                }
                                ?>
                                <?php 
                                if(isset($theme_options['twitterurl'])&& !empty($theme_options['twitterurl'])){
                                ?>
                                <li><a href="<?php echo $theme_options['twitterurl'];?>"><i class="mdi mdi-twitter"
                                            aria-hidden="true"></i></a></li>
                                <?php
                                }
                                ?>
                                <?php 
                                if(isset($theme_options['instaurl'])&& !empty($theme_options['instaurl'])){
                                ?>
                                <li><a href="<?php echo $theme_options['instaurl'];?>"><i class="mdi mdi-instagram"
                                            aria-hidden="true"></i></a></li>
                                <?php
                                }
                                ?>
                                <?php 
                                if(isset($theme_options['tripadvisor'])&& !empty($theme_options['tripadvisor'])){
                                ?>
                                <li><a href="<?php echo $theme_options['tripadvisor'];?>"><i
                                            class="fa fa-tripadvisor"></i></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="top-email-info">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <?php echo $theme_options['contact_email'];?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="header sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="logo">
                            <?php the_custom_logo();?>
                        </div>
                    </div>
                    <div class="">
                        <div class="mgea-full-width">
                            <div class="header-right">
                                <div class="header-menu d-none d-lg-block">

                                    <?php
										 wp_nav_menu( array(
                                            'theme_location' => 'menu-1',
                                            'container'       => 'div',
                                            'container_class' => 'menu',
                                            'menu_class'      => '',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'walker' => new WPDocs_Walker_Nav_Menu()
                                        ) );                                  
                                       
								   ?>
						</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile menu start -->
            <div class="mobile-menu-area d-block d-lg-none">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
						wp_nav_menu(
						array(
                            'theme_location' => 'menu-1',
                            'container'       => 'nav',
                            'container_class' => 'menu',
                            'container_id' => 'dropdown',
                            'container_class'=>'menu',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'walker' => new WPDocs_Walker_Nav_Menu()
						)
						);										
						?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile menu end -->
        </div>
        <!--Header section end-->