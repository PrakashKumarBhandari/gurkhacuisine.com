<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

/* Template Name: Full Menu

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
        <div class="food-item-tab home-page row">
            <div class="col-lg-12">
                <div class="foode-item-box fix mb-60">
                    <ul class="nav foode-item_nav" role="tablist">
                        <?php   if ($the_query_menu->have_posts()):
                                $cat_count = 1;
                                while ($the_query_menu->have_posts()) : $the_query_menu->the_post(); 
								?>
                        <li role="presentation"><a href="#tab<?php echo $cat_count;?>"
                                <?php if($cat_count == 1){ echo"class='active'"; }?> aria-controls="tab1"
                                data-toggle="tab"><?php echo get_the_title(); ?></a></li>
                        <?php
                                $cat_count++;
                                endwhile;
                                endif;
                                ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="food-item-desc">
                    <div class="tab-content">
                        <?php 
                        $cat_count_list = 1;
                        while ($the_query_menu->have_posts()) : $the_query_menu->the_post();
                        //$excerpt = excerpt(100);							
                        ?>
                        <div role="tabpanel" class="tab-pane <?php if($cat_count_list == 1){ echo"active";}?>"
                            id="tab<?php echo $cat_count_list;?>">
                            <div class="row">
                                <?php
                                        if (have_rows('menu_fields')):
                                        $menu = 0;
                                        while (have_rows('menu_fields')): the_row();
                                            $title = get_sub_field('title');
                                            $description = get_sub_field('description');
                                            $image_special = get_sub_field('special_sign');
                                            $first_submenu = 0;
                                            if (have_rows('sub_menu')) { 
										    ?>
                                <table class="table table-submenu">
                                    <tr>
                                        <td class="menu-title">
                                            <?php echo $title; ?>
                                            <?php
                                                        if (!empty($image_special['url'])):
                                                            ?>
                                            <img src="<?php echo $image_special['url']; ?>" alt=""
                                                style="display: inline;">
                                            <?php
                                                        endif; ?>
                                        </td>
                                        <?php
                                                    if ($menu == 0) {
                                                        ?>
                                        <td class="menu-subtitle">Veg.</td>
                                        <td class="menu-subtitle">Chicken</td>
                                        <td class="menu-subtitle">Lamb or Prawn</td>
                                        <td class="menu-subtitle">King Prawn</td>
                                        <?php
                                                    } else {
                                                        ?>
                                        <?php
                                                        while (have_rows('sub_menu')): the_row(); ?>
                                        <td class="menu-price"><?php the_sub_field('price') ?></td>
                                        <?php
                                                        endwhile;
                                                        ?>
                                        <?php
                                                    }
                                                    ?>
                                    </tr>
                                    <?php
                                                if (!empty($description)): ?>
                                    <tr>
                                        <td class="menu-description"><?php echo $description; ?></td>
                                    </tr>
                                    <?php endif; ?>
                                </table>

                                <?php
                                        $first_submenu++;
                                            }
                                            else
                                            {
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
                                            }
                                        $menu++;
                                        endwhile;
                                        endif;
                                        ?>
                            </div>
                        </div>
                        <?php
                        $cat_count_list++;
                        endwhile; 
                        ?>
                    </div>
                    <div class="container clearfix">

                    </div>
                </div>
            </div>


            <div class="food-item-desc menu-notes content-center">
<!--                 <ul>
                    <li>
                        <span>
                            <img src="<?php echo get_template_directory_uri().'/images/menu-icons/1-chilli-small.png'; ?>"
                                alt="">
                        </span> - Medium
                    </li>
                    <li>
                        <span>
                            <img src="<?php echo get_template_directory_uri().'/images/menu-icons/2-chilli-small.png'; ?>"
                                alt="">
                        </span> - Hot
                    </li>
                    <li>
                        <span>
                            <img src="<?php echo get_template_directory_uri().'/images/menu-icons/3-chilli-small.png'; ?>"
                                alt="">
                        </span> - Extremely Hot
                    </li>
                    <li>
                        <span>
                            <img src="<?php echo get_template_directory_uri().'/images/menu-icons/v-small.png'; ?>"
                                alt="">
                        </span> - Vegetarian
                    </li>
                    <li>
                        <span>
                            (N)
                        </span> - Nuts
                    </li>
                </ul> -->
                <p><strong>Note:</strong> If you have any food allergies, Please speak to a member of our team who will
                    be happy to help with your query.</p>
            </div>

        </div>
    </div>
</div>
<!--Food menu section end-->

<?php
//get_sidebar();
get_footer();