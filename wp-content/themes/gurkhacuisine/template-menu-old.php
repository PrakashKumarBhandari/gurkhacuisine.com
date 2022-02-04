<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

/* Template Name: Older Menu

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
<!--contact us pages start-->
<!--Food menu section start-->
<div class="food-menu white-bg ptb-100">
    <div class="container">
        
        <div class="food-item-tab home-page row">
            <div class="col-lg-12">
                <div class="foode-item-box fix mb-60">
                    <ul class="nav foode-item_nav" role="tablist">
                        <?php 
								$categories = get_categories( array( 'taxonomy'		=> 'menu-category',
								'orderby'		=> 'id',
								'hierarchical'	=> 0,
								'parent'		=> 0,
								'hide_empty'	=>true
								)
								);
								if ( ! empty ( $categories ) ) :
								$cat_count = 1;
								foreach( $categories as $category ){
								?>
                        <li role="presentation"><a href="#tab<?php echo $cat_count;?>"
                                <?php if($cat_count == 1){ echo"class='active'";}?> aria-controls="tab1"
                                data-toggle="tab"><?php echo $category->cat_name;?></a></li>
                        <?php 
								if($cat_count>3){ /*break;*/ }
								$cat_count++;
								}
								endif;								
								?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="food-item-desc">
                    <div class="tab-content">
                        <?php 
								if ( ! empty ( $categories ) ) :
								$cat_count_list = 1;
								foreach( $categories as $category ){								
								?>
                        <div role="tabpanel" class="tab-pane <?php if($cat_count_list == 1){ echo"active";}?>"
                            id="tab<?php echo $cat_count_list;?>">
                            <div class="row">
                                <?php
										$menus = get_posts(	
										array (	'post_type'			=> 'menu',
										'posts_per_page'	=> -1,
										'numberposts'		=> -1,
										'order'				=> 'ASC',
										'orderby'			=> 'menu_order',
										'tax_query' => array(
													array(
														'taxonomy' => 'menu-category',
														'field' => 'slug',
														'terms' =>  $category->category_nicename,
														'include_children' => false
													)
												)
										)
										);

										foreach ( $menus as $post ) :
											setup_postdata( $post );
										?>
                                <div class="col-md-6">
                                    <div class="fooder-menu-description ">
                                        <div class="single-food-item mb-30">
                                            <div class="single-food-inner">
                                                <div class="food-img">
                                                    <?php 
															if (has_post_thumbnail()) {
															the_post_thumbnail(array('106','66'));
															} 
															else{
																echo'<img src="'.get_template_directory_uri().'/images/food/01.png" >';
															}?>
                                                </div>
                                                <div class="single-food-item-desc">
                                                    <div class="single-food-item-title">
                                                        <h2><a
                                                                href="<?php echo  get_permalink( get_the_ID() );?>"><?php echo get_the_title();?></a>
                                                        </h2>
                                                        <p><?php echo get_post_meta( get_the_ID(), 'short', true );?>
                                                        </p>
                                                    </div>
                                                    <div class="single-food-price">
                                                        <p><?php echo Money_Symbol.get_post_meta( get_the_ID(), 'price', true );?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <?php
                        if($cat_count_list>3){ /*break;*/}
                        $cat_count_list++;
                        }
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Food menu section end-->

<?php
//get_sidebar();
get_footer();