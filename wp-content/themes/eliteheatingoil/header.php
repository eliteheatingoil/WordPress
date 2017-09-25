<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo get_bloginfo( 'name' ); ?></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo get_bloginfo( 'template_directory' );?>/css/animate.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo( 'template_directory' );?>/dist/css/style.min.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>
</head>

<body>

<div class="container-fluid content">

	<div class="row nav">
		<div class="col-md-4 logo-burger"> 
			<img src="<?php echo get_bloginfo( 'template_directory' );?>/images/blue_long_logo.png" alt="" class="">
			<button class="burger-menu-btn">
				<i class="burger-icon bm-animation"></i>
				<span class="bg-menu-text">Menu</span>
			</button>
			<div style="clear:both;"></div>
		</div>

		<div class="col-md-8 info">
			<div class="row">
				<div class="information">
				<?php get_template_part('partials/nav-info'); ?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>

		<div class="col-md-12 navigation">
			<?php get_template_part('partials/nav'); ?>
		</div>

		<div class="mobile-nav">
			<?php get_template_part('partials/mobile-nav'); ?>
		</div>

	</div>

