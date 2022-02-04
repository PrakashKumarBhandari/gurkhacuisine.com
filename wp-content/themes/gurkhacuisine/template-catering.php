<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

/* Template Name: Catering

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
<div class="food-menu white-bg ptb-100">  
<?php
while ( have_posts() ) :
the_post();
?>
<div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-title mb-50 text-center white_bg">
                    <h4>Our Catering Feature</h4>
                    <h2 class="mb-50"><?php //the_title()?></h2>
                    <br/><br/><br/>
                    <p><?php the_content()?></p>
                </div>
            </div>
        </div>
</div>
<?php
endwhile; // End of the loop.
?>
<!--resta about end-->
</div>
      
        
        <!--choose us start-->
        <div class="choose-us">
            <div class="choose-us-top pt-100">
				<?php
					$post_why_us_id = 42;
					$post_r = get_post($post_why_us_id);
					$image_r = get_the_post_thumbnail($post_why_us_id,'full');
				?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="section-title white_bg mb-50 text-center">
                                <h2><?php echo $post_r->post_title;?></h2>
                                <p>
								<?php echo $post_r->post_content; ?>
								</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="choose-use-img">
								<?php echo $image_r;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <div class="choose-us-desc text-center">
              
               <div class="container">
                   <div class="row">
                        <?php 
                        global $post;
                        $args_why = array('posts_per_page' =>3, 'post_type' => 'whyus');
                        $post_why_us = get_posts($args_why);        
                        foreach ($post_why_us as $key => $post) :
                        setup_postdata($post);
                        ?>                     
                       <div class="col-md-4">
                           <div class="single-choose">
                               <a href=""><i class="<?php the_field('icon_class'); ?>"></i></a>
                               <h5><?php echo $post->post_title;?></h5>
                               <p><?php echo $post->post_excerpt;?></p>
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
        <!--choose us end-->
        
	

<?php
//get_sidebar();
get_footer();
