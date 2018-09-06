<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>

</head>

<body 
	<?php body_class(); 
	// This will display a class specific to whatever is being loaded by Wordpress
	// i.e. on a home page, it will return [class="home"]
	// on a single post, it will return [class="single postid-{ID}"]
	// and the list goes on. Look it up if you want more.
	?>
>

<header id="masthead" class="site-header">
	<div class="container center">
	
		<nav class="site-navigation main-navigation">
			<select onchange="javascript:location.href = this.value;">
				<option selected disabled>Select Theme</option>
				<option value="https://componentlibrary.000webhostapp.com/green-theme/">Green Theme</option>
				<option value="https://componentlibrary.000webhostapp.com/orange-gray-theme/">Orange Gray Theme</option>
				<option value="https://componentlibrary.000webhostapp.com/purple-theme/">Purple Theme</option>
			</select>
			<select onchange="javascript:location.href = this.value;">
				<option selected disabled>Select Component</option>
				<option value="https://componentlibrary.000webhostapp.com/action-grid/">Action Grid</option>
				<option value="https://componentlibrary.000webhostapp.com/blog-list/">Blog List</option>
				<option value="https://componentlibrary.000webhostapp.com/blog-scroll/">Blog Scroll</option>
				<option value="https://componentlibrary.000webhostapp.com/footer-menu/">Footer Menu</option>
				<option value="https://componentlibrary.000webhostapp.com/location-grid/">Location Grid</option>
				<option value="https://componentlibrary.000webhostapp.com/masthead-carousel/">Masthead Carousel</option>
				<option value="https://componentlibrary.000webhostapp.com/menu-colorful/">Menu Colorful</option>
				<option value="https://componentlibrary.000webhostapp.com/menu-fade/">Menu Fade</option>
				<option value="https://componentlibrary.000webhostapp.com/plan-menu/">Plan Menu</option>
				<option value="https://componentlibrary.000webhostapp.com/service-accordion/">Service Accordion</option>
				<option value="https://componentlibrary.000webhostapp.com/service-leaflets/">Service Leaflets</option>
				<option value="https://componentlibrary.000webhostapp.com/service-tile/">Service Tile</option>
				<option value="https://componentlibrary.000webhostapp.com/stats-odometer/">Stats Odometer</option>
				<option value="https://componentlibrary.000webhostapp.com/testimonial-bubbles/">Testimonial Bubbles</option>
				<option value="https://componentlibrary.000webhostapp.com/testimonial-carousel/">Testimonial Carousel</option>
			</select>
			<!-- <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?> -->
		</nav><!-- .site-navigation .main-navigation -->
	</div>
	<div class="center">

		<div id="brand">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home"><?php bloginfo( 'name' ); // Display the blog name ?></a>
			</h1>
			<h4 class="site-description">
				<?php bloginfo( 'description' ); // Display the blog description, found in General Settings ?>
			</h4>
		</div><!-- /brand -->
		
		<div class="clear"></div>
	</div><!--/container -->
		
</header><!-- #masthead .site-header -->

<main class="main-fluid"><!-- start the page containter -->
