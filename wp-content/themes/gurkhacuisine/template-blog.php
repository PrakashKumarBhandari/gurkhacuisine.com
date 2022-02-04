<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

/* Template Name: Blog

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
                <h3 class="breadcrubs-title">
                    <?php the_title(); ?>
                </h3>
                <ul>
                    <li><a href="<?php echo site_url();?>">home <span>//</span>  </a></li>
                    <li><?php the_title();?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
 <!--our blog section start-->
 <div class="our-blog-pages ptb-80">
            <div class="bg-mg-1">
                <div class="container">
                    <div class="row">
                        <?php 
                        global $post;
                        $args_blog = array('posts_per_page' =>3, 'post_type' => 'post');
                        $my_blog = get_posts($args_blog);        
                        foreach ($my_blog as $key => $post) :
                        setup_postdata($post);
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog mb-30">
                                <div class="blog-thumbnail">
                                    <?php 
                                    if (has_post_thumbnail()) {
                                    the_post_thumbnail(array('370','212'));
                                    } 
                                    else{
                                    echo'<img src="'.get_template_directory_uri().'/images/blog/1.jpg" >';
                                    }
                                    ?>
                                   
                                </div>
                                <div class="blog-desc">
                                    <div class="publish-date">
                                        <p><?php echo the_time('j');?><span><?php echo the_time('M');?></span></p>
                                    </div>
                                    <div class="blog-title">
                                        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                    </div>
                                </div>
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
        <!--our blog section end-->
<?php
//get_sidebar();
get_footer();
