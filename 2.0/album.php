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
	<link rel="stylesheet" type="text/css" href="js/assets/owl.carousel.css">
	<!-- RS5.0 Styles -->
	<link rel="stylesheet" type="text/css" href="css/css/settings.css">
	<link rel="stylesheet" type="text/css" href="css/css/layers.css">
	<link rel="stylesheet" type="text/css" href="css/css/navigation.css">
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
	} else {
		$langue='fr';
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
		<form action="#" id="search-header" name="search-header">
			<input type="search" name="search" placeholder="Type and Hit Enter..">
			<button>Search</button>
		</form>
		<div class="container nav-wrapper">
			<!-- Logo -->
			<div class="site-branding">
				<div class="site-branding">
				<?php 
					if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
						$langue='en';
						?>
						<form action="" method="post" >	
							<input class="btn " type="hidden" name="l" value="fr" />
							<input class="btn " type="submit" id="langue_fr" value="Francais">
						</form>
						<?php
					} else {
					$langue='fr';
					?>
					<form action="" method="post" style="display:none;">	
						<input class="btn " type="hidden" name="l" value="en" />
						<input class="btn " type="submit" id="langue_en" value="English">
					</form>	
					<?php 
					}
					?>
				</div>
			</div>
			<!-- Main Mneu -->
			<nav id="site-navigation" class="site-navigation">
				<ul id="main-menu">
					<li class="active">
						<a href="index.php#music">Music</a>
					</li>
					<li class="">
						<a href="index.php#videos">Vidéos</a>
					</li>
					<li class="">
						<a href="index.php#tour">Tour</a>
					</li>
					<li class="logo_gorillaz">
						<a href="index.php"><img src="img/logo.png" alt="logo_gorillaz" height="70"></a>
					</li>
					<li class="">
						<a href="index.php#blog">Blog</a>
					</li>
					<li class="">
						<a href="index.php#store">Store</a>
					</li>
					<li class="">
						<a href="index.php#contact">Contact</a>
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
						<img src="assets/img/cart/mini-1.jpg" alt="">
						<h6>This is Product Title</h6>
						<span>1 x $120</span>
						<i class="fa fa-close"></i>
					</div>
					<div class="product clearfix">
						<img src="assets/img/cart/mini-2.jpg" alt="">
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

	<div class="site-content">
		<!-- Album Single -->
		<div class="album-single-page-wrapper">
			<div class="container section">
				<div class="row album-single">
					<h2 class="album-name col-xs-12">Plastic Beach</h2>
					<div class="col-md-4 col-sm-5 clearfix">
						<div class="bordered">
							<img src="images/1.jpg" alt="" class="img-responsive">
						</div>
						<div class="description">
							<h4 class="title">Album Info</h4>
							<ul class="meta">
								<li class="clearfix"><span>Artist:</span><span>Gorillaz</span></li>
								<li class="clearfix"><span>Release Date:</span><span>9 March, 2010</span></li>
								<li class="clearfix"><span>Genre:</span><span>rock, hip-hop alternatif, electropop, trip hop</span></li>
								
							</ul>
							<div class="buy clearfix">
								<h4 class="price">Price: $32.00</h4>
								<a href="#" class="btn"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-sm-7">
						<div class="default-player">
							<div id="jquery_jplayer_2" class="jp-jplayer"></div>
							<div id="jp_container_2" class="jp-audio" role="application" aria-label="media player">
								<div class="jp-type-playlist">
									<div class="jp-gui jp-interface_2">
										<div class="player-bar">
											<div class="jp-controls">
												<button class="jp-previous" tabindex='0'><i class="fa fa-backward"></i></button>
												<button class="jp-play" tabindex='0'><i class="fa fa-play"></i></button>
												<button class="jp-next" tabindex="0"><i class="fa fa-forward"></i></button>
												<button class="jp-mute" tabindex="0"><i class="fa fa-volume-up"></i></button>
											</div>
											<div id="nowPlaying_2" class="nowPlaying">
												<span class="artist-name"></span>
												<span class="track-name"></span>
											</div>
											<div class="jp-progress">
												<div class="jp-seek-bar">
													<div class="jp-play-bar"></div>
												</div>
											</div>
										</div>
									</div>
									<div id="main-player-playlist-2" class="jp-playlist">
										<ul>
											<li class="clearfix">&nbsp;</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="description">
							<h4 class="title">Description</h4>
							<p>Le titre de l'album est confirmé le 27 novembre 2009 par le chanteur-compositeur et guitariste Damon Albarn au cours d'une interview avec The Guardian. Albarn a aussi révélé que les artistes Snoop Dogg, Lou Reed, Mos Def, Bobby Womack et De La Soul sont présents sur l'album. L'album est sorti en Europe le 8 mars 2010.</p>
						</div>
					</div>
				</div>
				<div class="row similar-albums">
					<h3 class="col-sm-12 title">Similar Albums</h3>
					<div class="col-sm-4">
						<a href="album2.php">
							<div class="similar-album bordered hover-effect">
								<div class="info-block">
									<h4>New Album</h4>
									<h5>Plastic Winter</h5>
								</div>
								<img src="images/albums/cov.jpg" alt="" class="img-responsive">
							</div>
						</a>
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
						<h2 class="newsletter-title">NEWSLETTER</h2>
					</div>
					<div class="form-block col-xs-12 col-sm-6">
						<div id="mc_embed_signup" >
							<form action="//gygsdesign.us13.list-manage.com/subscribe/post?u=2507fc14e180868221f4b663d&amp;id=bff66133bb" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<div id="mc_embed_signup_scroll">
									<div class="mc-field-group">
										<input type="email" value="" name="EMAIL" class="required email emailinput" id="mce-EMAIL" placeholder="Enter Your E-mail Here...">
										<div class="button-wrap"><button name="subscribe" type="submit" class="button" id="mc-embedded-subscribe">Subscribe</button></div>
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
					<h4 class="widget-title">About US</h4>
					<div class="widget-content">
						<p>Lorem ipsum dolor sit amet, consectetur  adipiscing eli esent massa libero, tristiq ue placerat sapien in, tincidmollis dui. Curabitur gravida felis turpis, non malesua est placerat eget. Cras vel fringilla mi. </p>
						<ul class="social-networks bg clearfix">
							<li><a class="fa fa-facebook" href="http://facebook.com"></a></li>
							<li><a class="fa fa-facebook" href="http://plus.google.com"></a></li>
							<li><a class="fa fa-facebook" href="http://twitter.com"></a></li>
							<li><a class="fa fa-facebook" href="http://spotify.com"></a></li>
							<li><a class="fa fa-facebook" href="http://soundcloud.com"></a></li>
							<li><a class="fa fa-facebook" href="http://youtube.com"></a></li>
						</ul>
					</div>
				</div>
				<div class="widget col-sm-4 twitter-widget">
					<h4 class="widget-title">Twitter</h4>
					<div id="twitter-feed"></div>
				</div>	
				<div class="widget col-sm-4 instagram-widget">
					<h4 class="widget-title">Instagram</h4>
					<ul id="footer-insta" class="clearfix"></ul>
				</div>
			</div>
		</div>
		<div class="footer-bar">
			<div class="container relative-pos z-index">
				<p class="col-sm-6">Copyright 2016 <a href="#">FutureThemes</a> | Allrights Reserved</p>
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
		// Second Player
		var changeTrack2 = function changeTrack(event) {
	        var current = myPlaylist_2.current,
	        	playlist = myPlaylist_2.playlist;       
	        $.each(playlist, function (index, obj) {
	            if (index == current) {
	                $("#nowPlaying_2 .artist-name").html(obj.artist);
	                $("#nowPlaying_2 .track-name").html(obj.title);
	            }
	        });
	    };
		
		var myPlaylist_2 = new jPlayerPlaylist({
			jPlayer: "#jquery_jplayer_2",
			cssSelectorAncestor: "#jp_container_2",
		}, [
			// This playlist doesn't require poster image
			{
				artist: "Gorillaz",
				title:"Orchestral Intro",
				mp3:"audios/Track-3.mp3",
				free: true
			},
			{	
				artist: "Gorillaz, Snoop Dogg",
				title:"Welcome to the World of the Plastic Beach ",
				mp3:"audios/Track-1.mp3"
			},
			{
				artist: "Gorillaz, Bashy, Kano",
				title:"White Flag ",
				mp3:"audios/Track-2.mp3"
			},
			{
				artist: "Gorillaz",
				title:"Rhinestone Eyes",
				mp3:"audios/Track-4.mp3"
			},
			{
				artist: "Gorillaz, Mos Def",
				title:"Stylo",
				mp3:"audios/Track-5.mp3"
			},
			{
				artist: "Gorillaz, De La Soul, Gruff Rhys",
				title:"Superfast Jellyfish ",
				mp3:"audios/Track-3.mp3",
			},
			{
				artist: "Gorillaz, Nagano",
				title:"Empire Ants",
				mp3:"audios/Track-1.mp3"
			},
			{
				artist: "Gorillaz, Smith",
				title:"Glitter Freeze",
				mp3:"audios/Track-2.mp3"
			},
			{
				artist: "Gorillaz, Reed",
				title:"Some Kind of Nature",
				mp3:"audios/Track-2.mp3"
			},
			{
				artist: "Gorillaz",
				title:"On Melancholy Hill",
				mp3:"audios/Track-2.mp3"
			},
			{
				artist: "Gorillaz",
				title:"Broken",
				mp3:"audios/Track-2.mp3"
			},
			{
				artist: "Gorillaz, Mos Def",
				title:"Sweepstakes",
				mp3:"audios/Track-2.mp3"
			},
			{
				artist: "Gorillaz",
				title:"Plastic Beach",
				mp3:"audios/Track-2.mp3"
			},
			{
				artist: "Gorillaz, Nagano",
				title:"To Binge",
				mp3:"audios/Track-2.mp3"
			},
			{
				artist: "Gorillaz",
				title:"Cloud of Unknowing",
				mp3:"audios/Track-2.mp3"
			},
			{
				artist: "Gorillaz",
				title:"Pirate Jet",
				mp3:"audios/Track-2.mp3"
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
            ready: changeTrack2,
		    play: changeTrack2,
		});

	});//end .ready
	</script>

</body>
</html>