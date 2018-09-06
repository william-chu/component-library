<?php
/*
Plugin Name: Blog Scroll
Description: Displays blog titles in a scroll window, set max posts in WP-Admin Reading settings, adjust the scroll height for marquee animation in CSS file
Author: William Chu
Version: 0.1
*/
function blog_scroll($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'hospital_image' => 'https://componentlibrary.000webhostapp.com/wp-content/uploads/2018/09/building.jpg'
  ), $atts);
  $args = array(
    'category_name' => 'News'
  );
  // set the "paged" parameter (use 'page' if the query is on a static front page)
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  // the query
  $query = new WP_Query('category_name='. $args['category_name'] . '&paged=' . $paged);
?>
<div class="blog-scroll-container">
  <div class="blog-scroll-rail">
    <div class="blog-scroll-grid">
      <h1 class="blog-scroll-header">
        <div class="blog-scroll-header-flex">
          <div>N</div>
          <div>E</div>
          <div>W</div>
          <div>S</div>
        </div>
      </h1>
      <div class="blog-scroll-posts">
        <div class="blog-scroll-marquee-container">
          <div class="blog-scroll-marquee">
            <!-- Begin loop  -->
            <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="blog-scroll-item">
              <a href="<?php the_permalink(); ?>"><h2 class="blog-scroll-title"><?php the_title(); ?></h2></a>
            </div>
            <?php endwhile; else : ?>
              <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
            <!-- End Loop -->
          </div>
        </div>
      <br>
      <a class="blog-scroll-link" href="#">View Blog</a>
    </div>
      <img class="blog-scroll-image" src="<?php echo $data['hospital_image']; ?>" alt="hospital image"/>
    </div>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('blog_scroll', 'blog_scroll');
function blog_scroll_assets() {
wp_enqueue_script( 'BSscripts',  plugin_dir_url( __FILE__ ) . '/blog-scroll.js', array( 'jquery' ) );
wp_enqueue_style( 'BSstyles',  plugin_dir_url( __FILE__ ) . '/blog-scroll.css' );
}
add_action('wp_enqueue_scripts', 'blog_scroll_assets');

?>
