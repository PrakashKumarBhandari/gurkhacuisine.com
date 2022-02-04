<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

/* Template Name: Gallery

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
<div class="breadcrubs"
    <?php if(get_field('background_image')):  ?>style="background:url('<?php echo $bg_image_url;?>') no-repeat scroll center center / cover!important;"
    <?php endif;?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcurbs-inner text-center">
                    <h3 class="breadcrubs-title">
                        <?php the_title(); ?>
                    </h3>
                    <ul>
                        <li><a href="<?php echo site_url();?>">home <span>//</span> </a></li>
                        <li><?php the_title();?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrubs end-->
<!--Our gallery start-->
<div class="our-gallery white-bg-forse">
    <div class="bg-img-2">
        <div class="container">            
            <div class="row">
                <div class="col-lg-12">                    
                    <div class="gallery-item-box row">
                        <?php
                        $args_gallery = array(
                        'posts_per_page' => -1,
                        'post_type' => 'gallery'
                        );
                        
                        $the_query_gallery = new WP_Query($args_gallery);
                        if ($the_query_gallery->have_posts()):
                        while ($the_query_gallery->have_posts()): $the_query_gallery->the_post();                       
                           
                            if (have_rows('images')):
                                while (have_rows('images')): the_row();
                                $featured_image = get_sub_field('image');
                             
                                 $img_small = $featured_image['sizes']['medium'];
                                 $img_full =  $featured_image['url'];
                            ?>
                            <div class="col-lg-4 col-md-6 gallery-item desert drink mb-30">
                                <div class="single-item-gallery">
                                    <a href="<?php echo $img_full;?>">
                                        <span class="plus"><i class="mdi mdi-plus"></i></span>
                                    </a>
                                    <img src="<?php echo $img_small; ?>" alt="">
                                </div>
                            </div>
                        <?php
                                endwhile;
                            endif;
                        endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Our gallery end-->

<?php
//get_sidebar();
get_footer();