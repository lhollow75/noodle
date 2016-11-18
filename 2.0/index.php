<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gorillaz</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/ico" href="assets/img/favicon.ico" />
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700%7cSource+Sans+Pro:400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/nivo-lightbox.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<!-- RS5.0 Styles -->
	<link rel="stylesheet" type="text/css" href="css/settings.css">
	<link rel="stylesheet" type="text/css" href="css/layers.css">
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<?php
	require_once ('connexionbdd.php'); 
	include 'fonctionsbdd.php';
	include 'mail.php';
	session_start();
	if (!empty($_POST)){
		$_SESSION['lang']=$_POST['l'];
	} else {
		$_SESSION['lang']='fr';
	}
	if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
		$langue='en';
	} else if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'fr'){
		$langue='fr';
	} else {
		$langue='de';
	}
	$date=recupEvent($mysql);
	$affiche=recupTexte($mysql, $langue);
	$article = recupArticles($mysql, $langue);
	?>
	<script type="text/javascript">
		function open_infos(){
			window.open('envoiok.php?nom:<?php echo $_POST["name"];?>','messagerecu','menubar=no, scrollbars=no, top=100, left=100, width=300, height=200');
		}
	</script>
</head>
<body>
	
	<!-- Header -->
	<header id="site-header">
		<div class="container nav-wrapper">
			<!-- Logo -->
			<div class="site-branding">
				<?php 
				if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
					?>
					<form action="index.php" method="post" id="language">	
						<input type="hidden" name="l" value="fr" />
						<input class="btn " type="submit" id="langue_fr" value="Francais">
					</form>
					<form action="" method="post" id="language">	
						<input type="hidden" name="l" value="de" />
						<input class="btn " type="submit" id="langue_de" value="Deutsch">
					</form>
					<?php
				} else if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'fr'){
					?>
					<form action="index.php" method="post" id="language">	
						<input type="hidden" name="l" value="en" />
						<input class="btn " type="submit" id="langue_en" value="English">
					</form>
					<form action="" method="post" id="language">	
						<input type="hidden" name="l" value="de" />
						<input class="btn " type="submit" id="langue_de" value="Deutsch">
					</form>
					
				<?php 
				} else {
					?>
					<form action="" method="post" id="language">	
						<input type="hidden" name="l" value="fr" />
						<input class="btn " type="submit" id="langue_fr" value="Francais">
					</form>
					<form action="" method="post" id="language">	
						<input type="hidden" name="l" value="en" />
						<input class="btn " type="submit" id="langue_en" value="English">
					</form>
					<?php
				}
				?>
			</div>
			<!-- Main Mneu -->
			<nav id="site-navigation" class="site-navigation">
				<ul id="main-menu">
					<li class="active">
						<a href="#albums">Music</a>
					</li>
					<li class="">
						<a href="#videos">Vidéos</a>
					</li>
					<li class="">
						<a href="#tour">Tour</a>
					</li>
					<li class="logo_gorillaz">
						<a href="index.php"><img src="img/logo.png" alt="logo_gorillaz" height="70"></a>
					</li>
					<li class="">
						<a href="#blog">Blog</a>
					</li>
					<li class="">
						<a href="#store"><?php echo $affiche['boutique'][$langue]; ?></a>
					</li>
					<li class="">
						<a href="#contact"><?php echo $affiche['contact'][$langue]; ?></a>
					</li>
				</ul>
			</nav>
			<!-- Extra Nav -->
			<div class="extra-nav">
				<button id="mini-cart-toggle"><i class="fa fa-shopping-cart"></i> <span class="mini-cart-count">2</span></button>
				<button id="search-toggle"><i class="fa fa-search"></i></button>
				<button id="menu-toggle"><i class="fa fa-bars"></i></button>
				<!-- Mini Cart Widget -->
				<div id="mini-cart-widget">
					<h5 class="title">2 Products</h5>
					<div class="product clearfix">
						<img src="images/mini/1.jpg" alt="">
						<h6>This is Product Title</h6>
						<span>1 x $120</span>
						<i class="fa fa-close"></i>
					</div>
					<div class="product clearfix">
						<img src="images/mini/2.jpg" alt="">
						<h6>This is Product Title</h6>
						<span>2 x $60</span>
						<i class="fa fa-close"></i>
					</div>
					<div class="mini-cart-footer">
						<h4 class="subtotal">Subtotal: <span>$240</span></h4>
						<a href="#" class="btn ">Checkout</a >
						<a href="#" class="link">View Cart</a>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<!-- Site Content -->
	<div class="site-content">
		
		<!-- Main Slider -->
		<div class="rev_slider_wrapper">
		 	<div id="main-slider" class="rev_slider"  data-version="5.0">
		 		<ul>	
		 			<!-- Slide 1 -->
					<li data-transition="fadefromleft" data-thumbnail="images/drawings/test1.png">
						<!-- Main Image -->
						<img src="images/drawings/test1.jpg" alt="">

					</li>
		 		</ul>
		 	</div>
		</div>
		
		<!-- Single Album Player -->
		<div class="home-player-wrapper">
			<div class="container relative-pos">
				<div id="jquery_jplayer_1" class="jp-jplayer"></div> 
				<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
					<div class="jp-type-playlist">
						<div class="jp-gui jp-interface left-controls">
							<div class="jp-controls">
								<button class="jp-previous" tabindex='0'><i class="fa fa-backward"></i></button>
								<button class="jp-play" tabindex='0'><i class="fa fa-play"></i></button>
								<button class="jp-next" tabindex="0"><i class="fa fa-forward"></i></button>
							</div>
						</div>
						<div id="nowPlaying" class="nowPlaying">
							<span class="artist-name"></span>
							<span class="track-name"></span>
						</div>
						<div class="jp-gui jp-interface right-controls">
							<div class="jp-controls">
								<button class="jp-mute" tabindex="0"><i class="fa fa-volume-up"></i></button>
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
								<button id="playlist-toggle"><i class="fa fa-bars"></i></button>
							</div>
						</div>
						<div id="main-player-playlist" class="jp-playlist fulscreen-playlist">
							<div class="container playlist-container">
								<div class="col-lg-10 col-lg-offset-1 playlist-btn-container"><button id="close-playlist"><i class="fa fa-close"></i></button></div>
								<ul class="col-lg-10 col-lg-offset-1">
									<li>&nbsp;</li>
								</ul>
							</div>
							
						</div>
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Artist -->
		<div id="albums" class="container artists-home-wrapper section">
			<div class="section-title pdb-60">
				<h2>ALbums</h2>
			</div>
			<div class="row artists">

				<div class="col-sm-4">
					<a href="album2.php">
						<div class="artist bordered hover-effect">
							<div class="overlay"></div>
							<img class="img-responsive" src="images/backgrounds/cov1.jpg" alt="">
							<div class="info-block">
								<img  class="img-responsive" src="images/members/0.jpg" alt="">
								<h3>Plastic Winter</h3>
								<div class="show-on-hover">
									<p>See the album</p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<a href="album.php">
						<div class="artist bordered hover-effect">
							<div class="overlay"></div>
							<img class="img-responsive"  src="images/backgrounds/cov2.jpg" alt="">
							<div class="info-block">
								<img  class="img-responsive" src="images/members/4.jpg" alt="">
								<h3>Plastic Beach</h3>
								<div class="show-on-hover">
									<p></p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<a href="album.php">
						<div class="artist bordered hover-effect">
							<div class="overlay"></div>
							<img class="img-responsive" src="images/backgrounds/cov3.jpg" alt="">
							<div class="info-block">
								<img  class="img-responsive" src="images/members/5.jpg" alt="">
								<h3>Demon Days</h3>
								<div class="show-on-hover">
									<p></p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<a href="album.php">
						<div class="artist bordered hover-effect">
							<div class="overlay"></div>
							<img class="img-responsive" src="images/backgrounds/cov4.jpg" alt="">
							<div class="info-block">
								<img  class="img-responsive" src="images/members/6.jpg" alt="">
								<h3>The Fall</h3>
								<div class="show-on-hover">
									<p></p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<a href="album.php">
						<div class="artist bordered hover-effect">
							<div class="overlay"></div>
							<img class="img-responsive"  src="images/backgrounds/cov5.jpg" alt="">
							<div class="info-block">
								<img  class="img-responsive" src="images/members/7.jpg" alt="">
								<h3>G-Sides</h3>
								<div class="show-on-hover">
									<p></p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<a href="album.php">
						<div class="artist bordered hover-effect">
							<div class="overlay"></div>
							<img class="img-responsive" src="images/backgrounds/cov6.jpg" alt="">
							<div class="info-block">
								<img  class="img-responsive" src="images/members/8.jpg" alt="">
								<h3>D-Sides</h3>
								<div class="show-on-hover">
									<p></p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<a href="album.php">
						<div class="artist bordered hover-effect">
							<div class="overlay"></div>
							<img class="img-responsive" src="images/backgrounds/cov7.jpg" alt="">
							<div class="info-block">
								<img  class="img-responsive" src="images/members/9.jpg" alt="">
								<h3>Gorillaz</h3>
								<div class="show-on-hover">
									<p></p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<a href="album.php">
						<div class="artist bordered hover-effect">
							<div class="overlay"></div>
							<img class="img-responsive"  src="images/backgrounds/cov8.jpg" alt="">
							<div class="info-block">
								<img  class="img-responsive" src="images/members/11.jpg" alt="">
								<h3>Laika Come Home</h3>
								<div class="show-on-hover">
									<p></p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>

		

		<!-- Events -->
		<div id ="tour" class="events-home-wrapper">
			<div class="overlay-section">
				<div class="container section">
					<div class="section-title pdb-30">
						<h2><?php echo $affiche['even'][$langue]; ?></h2>
						<div class="sep"></div>
						<p><?php echo $affiche['ph_even'][$langue]; ?></p>
					</div>
					<div class="events">
						<div class="next-event-countdown">
							<ul class="events-home-countdown start_countdown clearfix" data-date="31 october 2018 12:00:00">
							    <li><span class="days">00</span> <span class="timeRefDays"><?php echo $affiche['jours'][$langue]; ?></span></li>
							    <li><span class="hours">00</span><span class="timeRefHours"><?php echo $affiche['heures'][$langue]; ?></span></li>
							    <li><span class="minutes">00</span><span class="timeRefMinutes"><?php echo $affiche['min'][$langue]; ?></span></li>
							    <li><span class="seconds">00</span><span class="timeRefSeconds"><?php echo $affiche['sec'][$langue]; ?></span></li>
							</ul> 
						</div>
						<div class="event clearfix">
							<div class="date">
								<h2>31</h2>
								<p>Oct, 2018</p>
							</div>
							<h4 class="title">Nocturna Show in Bucharest</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>Sala Polivalenta, Bucharest</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn"><?php echo $affiche['achat_tick'][$langue]; ?></a>
							</div>
						</div>
						<div class="event clearfix even">
							<div class="date">
								<h2>22</h2>
								<p>Nov, 2020</p>
							</div>
							<h4 class="title">Titan Slayer Live in Underground Pub</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>Stadium, France</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn"><?php echo $affiche['achat_tick'][$langue]; ?></a>
							</div>
						</div>
						<div class="event clearfix">
							<div class="date">
								<h2>29</h2>
								<p>Nov, 2022</p>
							</div>
							<h4 class="title">Clitgore at Rockstad Extreme Fest</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>Dt, Germany</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn"><?php echo $affiche['achat_tick'][$langue]; ?></a>
							</div>
						</div>
						<div class="event clearfix even">
							<div class="date">
								<h2>16</h2>
								<p>Dec, 2024</p>
							</div>
							<h4 class="title">K Project First Public Show in Altlantis</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>UK, London</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn"><?php echo $affiche['achat_tick'][$langue]; ?></a>
							</div>
						</div>
						<div class="event clearfix">
							<div class="date">
								<h2>31</h2>
								<p>Dec, 2026</p>
							</div>
							<h4 class="title">Titan Slayer New Years Day!</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>Location no.45, Romania</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn"><?php echo $affiche['achat_tick'][$langue]; ?></a>
							</div>
						</div>
					</div>
					<div class="btn-wrapper pdt-70">
						<a href="#" class="btn big first"><i class="fa fa-user"></i><?php echo $affiche['tte_dates'][$langue]; ?></a>
						<a href="#" class="btn big dark"><i class="fa fa-user"></i><?php echo $affiche['past_event'][$langue]; ?></a>
					</div>
				</div>
			</div>
		</div>

		<div id="videos" class="videos section container">
			<div class="section-title pdb-60">
				<h2>Videos</h2>
			</div>
			<div class="row artists">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/HyHNuVaZJ-k" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/1V_xRb0x9aw" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/WXR-bCF5dbM" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/cLnkQAeMbIM" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/nhPaWIeULKk" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/04mfKJWDSzI" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/hji4gBuOvIQ" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/uAOR6ib95kQ" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/UclCCFNG9q4" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/Tq7Ovshz1UI" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/14LOV9m0jvk" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/i4WPbqsIi0k" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/04mfKJWDSzI" frameborder="0" allowfullscreen></iframe>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/PiNdcBg3xC8" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>

		<!-- Blog -->
		<div id="blog" class="blog-home-wrapper">
			<div class="overlay-section">
				<div class="container section ">
					<div class="section-title pdb-30">
						<h2><?php echo $affiche['dernieresn'][$langue]; ?></h2>
						<div class="sep"></div>
					</div>
					<div class="row blog-posts">
						<?php
						foreach ($article as $key => $value){
							?>
							<div class="col-sm-4">
								<div class="blog-post-home">
									<div class="bordered img-wrapper">
										<div class="overlay"></div>
										<a href="<?php echo $value['lien']; ?>">
										<img class="img-responsive" src="images/articles/<?php echo $value['img'];?>" alt="image-<?php echo $value['titre']; ?>">
										<!--	<img class="img-responsive" src="/img/<?php echo $value['img'];?>" alt="image-<?php echo $value['titre']; ?>">
										--></a>
									</div>
									<a href="article.html"><h3><?php echo $value['titre']; ?></h3></a>
									<h5><i class="fa fa-clock-o"></i><?php echo $value['date_insert']; ?></h5>
									<p><?php echo substr($value['article'], 0, 500); ?>...</p>
									<a href="article.html" class="btn"><?php echo $affiche['lire_plus'][$langue]; ?></a>
								</div>
							</div>
						<?php
						}
						 ?>
					</div>
					<div class="btn-wrapper pdt-70">
						<a href="#" class="btn big"><i class="fa fa-user"></i><?php echo $affiche['tte_news'][$langue]; ?></a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Recent Prodcuts -->
		<div id="store" class="recent-products-home-wrapper ">
			<div class="container section">
				<div class="section-title pdb-30">
					<h2><?php echo $affiche['boutique'][$langue]; ?></h2>
					<div class="sep"></div>
				</div>
				<div class="row recent-products">
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/1.jpg" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i><?php echo $affiche['ajout_pani'][$langue]; ?></a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">tshirt plastic winter</h5></a>
							<div class="meta">
								<h6 class="product-cat">T-shirt</h6>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
								<h5 class="price">$20.00</h5>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/2.jpg" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i><?php echo $affiche['ajout_pani'][$langue]; ?></a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">hoodie plastic winter</h5></a>
							<div class="meta">
								<h6 class="product-cat">Sweater</h6>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star empty"></i></li>
								</ul>
								<h5 class="price">$25.00</h5>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/3.jpg" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i><?php echo $affiche['ajout_pani'][$langue]; ?></a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Sweat shirt plastic winter</h5></a>
							<div class="meta">
								<h6 class="product-cat">Sweter</h6>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star empty"></i></li>
								</ul>
								<h5 class="price">$35.00</h5>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/4.jpg" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i><?php echo $affiche['ajout_pani'][$langue]; ?></a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Long leaves woman shirt</h5></a>
							<div class="meta">
								<h6 class="product-cat">Albums</h6>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star empty"></i></li>
								</ul>
								<h5 class="price">$40.00</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Contact -->
		<div id="contact" class="contact-home-wrapper">
			<div class="overlay-section">
				<div class="container section">
					<div class="section-title pdb-60">
						<h2><?php echo $affiche['contact'][$langue]; ?></h2>
						<div class="sep"></div>
						<!--<p><?php echo $affiche['text_conta'][$langue]; ?></p>-->
					</div>
					<div class="row contact-from">
						<form class="col-xs-12 general-form clearfix" action="contact.php" method="post" name="contact" id="contact-form">
							<div class="field-group row">
								<div class="field col-sm-4">
									<h5><?php echo $affiche['nom'][$langue]; ?><span>*</span></h5>
									<input name="name" type="text" class="required" title="Please type your name." placeholder="<?php echo $affiche['ph_nom'][$langue]; ?>">
								</div>
								<div class="field col-sm-4">
									<h5><?php echo $affiche['email'][$langue]; ?><span>*</span></h5>
									<input name="email" type="text" class="required" title="Please type your email." placeholder="Email...">
								</div>
								<div class="field col-sm-4">
									<h5><?php echo $affiche['sujet'][$langue]; ?></h5>
									<input name="Subject" type="text" placeholder="<?php echo $affiche['ph_sujet'][$langue]; ?>">
								</div>
							</div>
							<div class="field">
								<h5><?php echo $affiche['message'][$langue]; ?><span>*</span></h5>
								<textarea name="message" cols="15" rows="5" class="required" placeholder="Message..." title="Please type a message."></textarea>
							</div>
							<button onclick="javascript:open_infos();" class="btn big"><i class="fa fa-paper-plane"></i><?php echo $affiche['env_mess'][$langue]; ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Newsletter  -->
		<div class="newsletter-wrapper">
			<div class="container">
				<div class="row">
					<div class="title-block col-xs-12 col-sm-6">
						<i class="fa fa-envelope"></i>
						<h2 class="newsletter-title"><?php echo $affiche['ph_news'][$langue]; ?></h2>
					</div>
					<div class="form-block col-xs-12 col-sm-6">
						<div id="mc_embed_signup" >
							<form action="//gygsdesign.us13.list-manage.com/subscribe/post?u=2507fc14e180868221f4b663d&amp;id=bff66133bb" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<div id="mc_embed_signup_scroll">
									<div class="mc-field-group">
										<input type="email" value="" name="EMAIL" class="required email emailinput" id="mce-EMAIL" placeholder="<?php echo $affiche['ph_email'][$langue]; ?>">
										<div class="button-wrap"><button name="subscribe" type="submit" class="button" id="mc-embedded-subscribe"><?php echo $affiche['nl_insc'][$langue]; ?></button></div>
									</div>
									<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div><!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
									<div style="position: absolute; left: -5000px;"><input type="text" name="b_94c004fbd08face605b799ad9_60beb53d8e" tabindex="-1" value=""></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	
	<!-- Footer -->
	<footer id="colophon">
		<div class="container">
			<div class="row">
				<div class="widget col-sm-4 about-widget ">
					<div class="widget-content">
						<ul class="social-networks bg clearfix">
							<li><a class="fa fa-facebook" href="http://facebook.com"></a></li>
							<li><a class="fa fa-facebook" href="http://twitter.com"></a></li>
							<li><a class="fa fa-facebook" href="http://youtube.com"></a></li>
							<li><a class="fa fa-facebook" href="http://tumblr.com"></a></li>
							<li><a class="fa fa-facebook" href="http://instagram.com"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bar">
			<div class="container relative-pos z-index">
				<p class="col-sm-6">Copyright 2016 <a href="#">Noodles</a> | Allrights Reserved</p>
			</div>
		</div>
	</footer>

	<!-- Go to top button -->
	<div id="back-to-top" class="fa fa-arrow-circle-up"></div>
	<div id="pause-player" class="fa fa-play-circle"></div>

	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="js/jplayer.playlist.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	
	<script type="text/javascript" src="js/countdown.js"></script>
	<script type="text/javascript" src="js/twitterFetcher.js"></script>
	<script type="text/javascript" src="js/instafeed.min.js"></script>
	<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
	<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/mc.validate.js"></script>
	<!-- RS5.0 Core JS Files -->
	<script type="text/javascript" src="js/jquery.themepunch.tools.min.js?rev=5.0"></script>
	<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
	<script type="text/javascript" src="js/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="js/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="js/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="js/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="js/revolution.extension.actions.min.js"></script>
	<!-- END RS5.0 Core JS Files -->
	<script type="text/javascript" src="js/custom_js.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
    	"use strict";
		// First Player
    	var changeTrack = function changeTrack(event) {
	        var current = myPlaylist.current,
	        	playlist = myPlaylist.playlist;       
	        $.each(playlist, function (index, obj) {
	            if (index == current) {
	                $("#nowPlaying .artist-name").html(obj.artist);
	                $("#nowPlaying .track-name").html(obj.title);
	            }
	        });
	    };

		var myPlaylist = new jPlayerPlaylist({
			jPlayer: "#jquery_jplayer_1",
			cssSelectorAncestor: "#jp_container_1",
		}, [
			{
				artist: "Titan Slayer",
				title:"Sisters of Furry",
				mp3:"images/audios/Track-3.mp3",
				poster: "images/posters/poster-1.jpg",
				free: true
			},
			{	
				artist: "Titan Slayer",
				title:"Tempered Song",
				mp3:"images/audios/Track-1.mp3",
				poster: "images/posters/poster-1.jpg"
			},
			{
				artist: "Titan Slayer First",
				title:"Cyber Sonnet",
				mp3:"images/audios/Track-2.mp3",
				poster: "images/posters/poster-1.jpg"
			},
			{
				artist: "Titan Slayer feat Rihanna",
				title:"Free Song",
				mp3:"images/audios/Track-4.mp3",
				poster: "images/posters/poster-1.jpg"
			},
			{
				artist: "Titan Slayer",
				title:"Cro Magnon Man",
				mp3:"images/audios/Track-5.mp3",
				poster: "images/posters/poster-1.jpg"
			},
			{
				artist: "Titan Slayer feat Adelle",
				title:"Your Face",
				mp3:"images/audios/Track-3.mp3",
				poster: "images/posters/poster-1.jpg"
			},
			{
				artist: "Titan Slayer",
				title:"Lentement",
				mp3:"images/audios/Track-1.mp3",
				poster: "images/posters/poster-1.jpg"
			},
			{
				artist: "Titan Slayer",
				title:"Cro Magnon Man",
				mp3:"images/audios/Track-2.mp3",
				poster: "images/posters/poster-1.jpg"
			}
		],{
			playlistOptions: {
			    enableRemoveControls: true
			},
			swfPath: "assets/jplayer/jplayer",
			supplied: "oga, mp3",
			wmode: "window",
			useStateClassSkin: true,
			autoBlur: false,
			smoothPlayBar: false,
			keyEnabled: true,
			size: {
                width: "120px",
                height: "120px"
            },
            ready: changeTrack,
            play: function(event) {
            	changeTrack();
            	var $mythis = $(this);
            	$mythis.removeClass('spin-disk');
		    	setTimeout( function() { $mythis.addClass('spin-disk'); }, 100);
		    },
		    pause: function(event) {
		    	$(this).removeClass('spin-disk');
		    } 
		});
	});//end .ready
	</script>

</body>
</html>