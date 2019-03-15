<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
	<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
	<div class="text-center top-menu-container">
		<div class="container top-menu-wrapper">
			<div>
				<i class="margin-r-10 cursor-pointer fas fa-phone" title="Call"></i> 0800 204 679
				<i class="margin-r-10 cursor-pointer margin-l-20 fas fa-envelope" title="Email"></i> customercare@atcorp.co.za
			</div>
			<div>
				<i class="margin-l-20 cursor-pointer facebook-icon fab fa-facebook-f" title="Facebook"></i>
				<i class="margin-l-20 cursor-pointer twitter-icon fab fa-twitter" title="Twitter"></i>
				<i class="margin-l-20 cursor-pointer google-icon fab fa-google" title="Google"></i>
				<i class="margin-l-20 cursor-pointer insta-icon fab fa-instagram" title="Instagram"></i>
			</div>
		</div>
	</div>
	<div class="outer" id="top">
		<?php if (dynamic_sidebar('widget_name')) : else : endif ?>
		<?php do_action( 'cpotheme_before_wrapper' ); ?>
		<div class="wrapper">
			<div id="topbar" class="topbar">
				<div class="container">
					<?php do_action( 'cpotheme_top' ); ?>
					<div class="clear"></div>
				</div>
			</div>
			<header id="header" class="header">
				<div class="container">
					<?php do_action( 'cpotheme_header' ); ?>
					<div class='clear'></div>
				</div>
			</header>
			<?php do_action( 'cpotheme_before_main' ); ?>
			<div class="clear"></div>
