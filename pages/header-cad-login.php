
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<?php require 'config.php'; ?>
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Job Listing</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/linearicons.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/nice-select.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/animate.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/main.css">
</head>

<body>
	<header id="header" id="home">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="index.html"><img src="<?php echo BASE_URL; ?>/img/logo-vcrapido.png" width="185" height="63" alt="" title="" /></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="about-us.html">Como funciona</a></li>
						<li><a href="category.html">Avalialções</a></li>
						<?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])) : ?>
						<?php else : ?>
							<li><a class="ticker-btn" href="login.php">Login</a></li>
						<?php endif; ?>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header><!-- #header -->
	<!-- start banner Area -->
	<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white" style="font-size:29px;">
							<strong>Faça seu Cadastro como profissional gratuitamente, e só pague para investir em seu destaque!</strong>				
							</h1>	
							
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	