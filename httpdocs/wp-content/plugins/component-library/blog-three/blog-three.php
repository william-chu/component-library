<?php
/*
Plugin Name: Blog Three
Description: Shows three blog posts, use 2x1 width height images for featured post
Author: William Chu
Version: 0.1
*/
  function blog_three($atts) {
  	ob_start();
  	$data = shortcode_atts(array(
  	), $atts);
    $args = array(
      'category_name' => 'News',
      'posts_per_page' => '3',
    );
    $query = new WP_Query($args);
?>
<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
  <div class="blog-three-container">
    <div class="blog-three-container-rail">
      <img class="blog-three-paw-print" id="blog-three-cat-print1" src="http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/cat-footprint.png" alt="cat print"/>
      <img class="blog-three-paw-print" id="blog-three-cat-print2" src="http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/cat-footprint.png" alt="cat print"/>
      <img class="blog-three-paw-print" id="blog-three-dog-print3" src="http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/dog-footprint.png" alt="dog print"/>
      <img class="blog-three-paw-print" id="blog-three-dog-print4" src="http://componentlibrary.blogdrop.eu/wp-content/uploads/2018/09/dog-footprint.png" alt="dog print"/>
      <div class="blog-three-rail">
        <h1 class="blog-three-header">Latest From Our Blog</h1>
        <div class="blog-three-grid">
          <!-- Begin loop  -->
          <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="blog-three-item">
              <img class="blog-three-image" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="blog post image">
              <div class="blog-three-body">
                <h2 class="blog-three-title"><?php the_title(); ?></h2>
                <p class="blog-three-text"><?php remove_filter( 'the_excerpt', 'wpautop' ); the_excerpt(); ?></p>
                <a class="blog-three-link" href="<?php the_permalink(); ?>">Read More</a>
              </div>
            </div>
          <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>
          <!-- End Loop -->
        </div>
      </div>
    </div>
  </div>
	<?php
	return ob_get_clean();
}

add_shortcode('blog_three', 'blog_three');
function blog_three_assets() {
  wp_enqueue_script( 'BTscripts',  plugin_dir_url( __FILE__ ) . '/blog-three.js', array( 'jquery' ) );
	wp_enqueue_style( 'BTstyles',  plugin_dir_url( __FILE__ ) . '/blog-three.css' );
}
add_action('wp_enqueue_scripts', 'blog_three_assets');

?>
