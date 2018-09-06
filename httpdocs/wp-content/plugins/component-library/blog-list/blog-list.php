<?php
/*
Plugin Name: Blog List
Description: Displays blog posts in paginated format, set max posts in WP-Admin Reading settings
Author: William Chu
Version: 0.1
*/
function blog_list($atts) {
  ob_start();
  $data = shortcode_atts(array(
    'variable' => 'variable default'
  ), $atts);
  $args = array(
    'category_name' => 'News'
  );
  // set the "paged" parameter (use 'page' if the query is on a static front page)
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  // the query
  $query = new WP_Query('category_name='. $args['category_name'] . '&paged=' . $paged);
?>
<div class="blog-list-container">
  <div class="blog-list-rail">
    <!-- Begin loop  -->
    <div class="blog-list-page-nav">
      <?php
      // next_posts_link() usage with max_num_pages
      previous_posts_link( 'Newer Entries' );
      next_posts_link( 'Older Entries', $query->max_num_pages );
      ?>
    </div>
    <div>
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="blog-list-item">
        <a class="blog-list-title-link" href="<?php the_permalink(); ?>"><h2 class="blog-list-title"><?php the_title(); ?></h2></a>
        <h1 class="blog-list-date"><?php the_date(); ?></h1>
        <p><?php remove_filter( 'the_excerpt', 'wpautop' ); the_excerpt(); ?></p>
        <a class="blog-list-link" href="<?php the_permalink(); ?>">Read More</a>
      </div>
      <?php endwhile; ?>
    </div>
    <div class="blog-list-page-nav">
      <?php
      // next_posts_link() usage with max_num_pages
      next_posts_link( 'Older Entries', $query->max_num_pages );
      previous_posts_link( 'Newer Entries' );
      ?>
    </div>
    <?php
    // clean up after the query and pagination
    wp_reset_postdata();
    ?>
    <?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
  </div>
</div>
<?php
return ob_get_clean();
}

add_shortcode('blog_list', 'blog_list');
function blog_list_assets() {
wp_enqueue_script( 'BLscripts',  plugin_dir_url( __FILE__ ) . '/blog-list.js', array( 'jquery' ) );
wp_enqueue_style( 'BLstyles',  plugin_dir_url( __FILE__ ) . '/blog-list.css' );
}
add_action('wp_enqueue_scripts', 'blog_list_assets');

?>
