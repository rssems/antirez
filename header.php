<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<!--[if ie]>
		<meta content='IE=8' http-equiv='X-UA-Compatible'/>
	<![endif]-->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) { single_cat_title(); echo " - "; bloginfo('name'); } elseif (is_single() || is_page() ) { single_post_title(); } elseif (is_search() ) { bloginfo('name'); echo ""; echo wp_specialchars($s); } else { wp_title('',true); } ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>
<body>
<div class="container">
	<header>
		<h1>
			<a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>">
				<?php bloginfo('name'); ?>
			</a>
		</h1>
		<nav>
			<?php
			  $args = array(
			  'orderby' => 'post_title',
			  'order' => 'ASC',
				'post_type' => 'page',
				'showposts' => 1000,
				'caller_get_posts' => 1
			  ); 

			$pages = get_posts($args);
			      foreach($pages as $page) {
			          $out .=  '<a href="'.get_permalink($page->ID).'" title="'.wptexturize($page->post_title).'">'.wptexturize($page->post_title).'</a>';
			      }
			    echo $out;
			?>
		</nav>
		<nav id="account">
			<a href="javascript:;" onClick="alert('Coming Soon!');"><small>download theme for free →</small></a>
		</nav>
	</header>