<?php
/*
	Template Name: Sidebar/Home Page
	This page template has a sidebar built into it,
 	and can be used as a home page, in which case the title will not show up.
*/
get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary">
		<!-- PAT NOTE - SPAN WIDTH AND OFFSET IS A CUSTOM SETTING, NOT PERMANENT -->
		<div id="content" role="main">
			<?php if ( have_posts() ) :
			// Do we have any posts/pages in the database that match our query?
			?>
				<?php while ( have_posts() ) : the_post();
				// If we have a page to show, start a loop that will display it
				?>
					<article>
						<?php if (!is_front_page()) : // Only if this page is NOT being used as a home page, display the title ?>
							<h1>
								<?php the_title(); // Display the page title ?>
							</h1>
						<?php endif; ?>
						<div>
							<?php the_content();
							// This call the main content of the page, the stuff in the main text box while composing.
							// This will wrap everything in paragraph tags
							?>
							<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
						</div><!-- the-content -->
					</article>
				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>
			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				<article>
					<h1>Nothing has been posted like that yet</h1>
				</article>
			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
		</div><!-- #content .site-content -->
		<!-- PAT NOTE - HIDING SIDEBAR FOR FULL WIDTH PAGE -->
		<div id="sidebar" role="sidebar" style="display: none;">
			<?php get_sidebar(); // This will display whatever we have written in the sidebar.php file, according to admin widget settings ?>
		</div><!-- #sidebar -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
