<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

		<?php wp_head(); ?>
	</head>

	<body>
	<?php wp_body_open(); ?>
		<header class="cst-header">
			<div class="container">
				<div class="cst-header__left">
					<a href="<?php echo(is_front_page() ? '' : get_home_url()); ?>" class="cst-header__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.png" alt="logo">
					</a>
				</div>
				<div class="cst-header__right">
					<ul class="cst-header__nav">
						<li class="cst-header__nav--item current"><a href="javscript:void(0);">Home</a></li>
						<li class="cst-header__nav--item"><a href="javscript:void(0);">Services</a></li>
						<li class="cst-header__nav--item"><a href="javscript:void(0);">Portfolio</a></li>
						<li class="cst-header__nav--item"><a href="javscript:void(0);">About</a></li>
						<li class="cst-header__nav--item"><a href="/contacts">Contact</a></li>
					</ul>
					<button class="cst-header__searchBtn"></button>
					<button class="cst-header__loginBtn">
						Login
					</button>

					<button class="cst-header__mobileBurger">
						<span class="line"></span>
						<span class="line"></span>
						<span class="line"></span>
					</button>
				</div>
			</div>
		</header>
