<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gurkhacuisine
 */

?>

<article class="articles-details">
<div class="<?php  if ( has_post_thumbnail() ) { echo"blog-thumbnail mb-60"; }else{ echo "blog-no-thumbnail mb-30";}?>">
        <?php 
        if ( has_post_thumbnail() ) {
            the_post_thumbnail(array('870','400'));
        }
         ?>
        <div class="blog-publish">
        <?php if ( 'post' === get_post_type() ) :?>
            <div class="publish-date">                
                <p><?php echo the_time('j');?><span><?php echo the_time('M');?></span></p>                
            </div>
            <?php endif; ?>
            <div class="blog-title">
                <?php
				if ( is_singular() ) :
				the_title( '<h4 class="entry-title">', '</h4>' );
				else :
				the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				endif;
				?>
            </div>
        </div>
    </div>
    <div class="blog-desacription fix">
        <div class="b-desc-1">
            <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gurkhacuisine' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );
            ?>
            <?php
            // wp_link_pages(
            //     array(
            //     'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gurkhacuisine' ),
            //     'after'  => '</div>',
            //     )
            // );
            ?>
        </div>
    </div>
    
    <div class="blog-comment-box">
        <div class="comment-box-inner fix">
			<?php  //gurkhacuisine_entry_footer(); ?>           
        </div>        
    </div>
