<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gurkhacuisine
 */

get_header();
?>
  <!--Breadcrubs start-->
  <div class="breadcrubs ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcurbs-inner text-center">
                            <h3 class="breadcrubs-title">
                                404
                            </h3>
                            <ul>
                                <li><a href="<?php echo site_url();?>">home <span>//</span>  </a></li>
                                <li>Error 404</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <!--Breadcrubs end-->
       
        <div class="error-area text-center ptb-100">
           <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="error-content ">
                            <h2>404</h2>
                            <h3>Page not found!</h3>
                            <h4>Oops! Looks like something going rong</h4>
                            <p>We can’t seem to find the page you’re looking for <br>
                                make sure that you have typed the currect URL</p>
                            <a class="go-home" href="<?php echo site_url();?>">Go to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
get_footer();
