<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dare Gorillaz</title>
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
				<?php 
					if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
						$langue='en';
						?>
						<form action="" method="post">	
							<input class="btn " type="hidden" name="l" value="fr" />
							<input class="btn " type="submit" id="langue_fr" value="Francais">
						</form>
						<?php
					} else {
					$langue='fr';
					?>
					<form action="" method="post">	
						<input class="btn " type="hidden" name="l" value="en" />
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
						<a href="#music">Music</a>
					</li>
					<li class="">
						<a href="#videos">Vidéos</a>
					</li>
					<li class="logo_gorillaz">
						<a href="#index.html"><img src="img/logo.png" alt="logo_gorillaz" height="70"></a>
					</li>
					<li class="">
						<a href="#tour">Tour</a>
					</li>
					<li class="">
						<a href="#blog">Blog</a>
					</li>
					<li class="">
						<a href="#store"><?php echo $affiche['boutique'][$langue]; ?></a>
					</li>
					<li class="">
						<a href="#contact">Contact</a>
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
						<img src="images/drawings/test1.png" alt="">


						<!-- Layer 1 -->
						<div class="tp-caption big-caption tp-resizeme"
							id="slide-01-layer-01"
				       		data-x="center" data-hoffset="0" 
				        	data-y="top" data-voffset="240"
				        	data-width="['none']"
							data-height="['none']"  
				        	data-transform_idle="o:1;"
 							data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
				        	data-start="700"
				        	data-responsive_offset="on"><span>K-Project in Amsterdam</span>
				        </div>

				        <!-- Layer 2 -->
				        <div class="tp-caption normal-caption bordered-caption tp-resizeme"
							id="slide-01-layer-02"
				       		data-x="center" data-hoffset="0" 
				        	data-y="top" data-voffset="295"
				        	data-width="['none']"
							data-height="['none']"  
				        	data-transform_idle="o:1;"
 							data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
				        	data-start="700"
				        	data-responsive_offset="on"><span>Don't miss The Second K-Project Public Show</span>
				        </div>

				        <!-- Layer 3 -->
				        <div class="tp-caption btn big" 
				       		id="slide-01-layer-03"
				       		data-x="center" data-hoffset="0" 
				        	data-y="top" data-voffset="370"
				        	data-width="['none']"
							data-height="['none']"
							data-transform_idle="o:1;"
 							data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"   
				        	data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"event-single.html"}]'
				        	data-start="900"
				        	data-responsive_offset="on"><span><?php echo $affiche['savoirplus'][$langue]; ?></span>
				        </div>

					</li>
					<!-- Slide 1 -->
					<li data-transition="fadefromleft" data-thumbnail="images/drawings/test1.png">
						<!-- Main Image -->
						<img src="images/drawings/test1.png" alt="">


						<!-- Layer 1 -->
						<div class="tp-caption big-caption tp-resizeme"
							id="slide-01-layer-01"
				       		data-x="center" data-hoffset="0" 
				        	data-y="top" data-voffset="240"
				        	data-width="['none']"
							data-height="['none']"  
				        	data-transform_idle="o:1;"
 							data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
				        	data-start="700"
				        	data-responsive_offset="on"><span>Titan Slayer Best Concert</span>
				        </div>

				        <!-- Layer 2 -->
				        <div class="tp-caption normal-caption bordered-caption tp-resizeme"
							id="slide-01-layer-02"
				       		data-x="center" data-hoffset="0" 
				        	data-y="top" data-voffset="295"
				        	data-width="['none']"
							data-height="['none']"  
				        	data-transform_idle="o:1;"
 							data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
				        	data-start="700"
				        	data-responsive_offset="on"><span>A concert That we never forget</span>
				        </div>

				        <!-- Layer 3 -->
				        <div class="tp-caption btn big" 
				       		id="slide-01-layer-03"
				       		data-x="center" data-hoffset="0" 
				        	data-y="top" data-voffset="370"
				        	data-width="['none']"
							data-height="['none']"
							data-transform_idle="o:1;"
 							data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;" 
							data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"   
				        	data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"event-single.html"}]'
				        	data-start="900"
				        	data-responsive_offset="on">Learn More
				        </div>

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
		
		<!-- Albums -->
		<div class="albums-home-wrapper">
			<div class="overlay-section">
				<div class="container section">
					<div class="section-title pdb-30">
						<h2>Latest Albums</h2>
						<div class="sep"></div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas enim diam, placerat sed ligula ia maximus enim. Nulla tincidunt turpis enim, eu commodo elit blandit ut</p>
					</div>
					<div class="row albums">
						<div class="col-sm-4">
							<div class="album-container bordered
							hover-effect">
								<div class="overlay"></div>
								<img  class="img-responsive" src="images/2.jpg" alt="">
								<div class="info-block">
									<div class="album-title">
										<h3>Lacuna Coil</h3>
										<h1>Comalies</h1>
									</div>
									<div class="show-on-hover">
										<div class="sep"></div>
										<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
										<a href="album-single.html" class="btn">See Album</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="album-container bordered hover-effect">
								<div class="overlay"></div>
								<img class="img-responsive" src="images/2.jpg" alt="">
								<div class="info-block">
									<div class="album-title">
										<h3>Titan Slayer</h3>
										<h1>Sisters of Fury</h1>
									</div>
									<div class="show-on-hover">
										<div class="sep"></div>
										<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
										<a href="album-single.html" class="btn">See Album</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="album-container bordered
							 hover-effect">
								<div class="overlay"></div>
								<img class="img-responsive" src="images/2.jpg" alt="">
								<div class="info-block">
									<div class="album-title">
										<h3>Between Colors</h3>
										<h1>Sea Lover</h1>
									</div>
									<div class="show-on-hover">
										<div class="sep"></div>
										<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
										<a href="album-single.html" class="btn">See Album</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="btn-wrapper pdt-70">
						<a href="albums.html" class="btn big"><i class="fa fa-dot-circle-o"></i>All Albums</a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Artist -->
		<div class="container artists-home-wrapper section">
			<div class="section-title pdb-60">
				<h2>Band Members</h2>
				<div class="sep"></div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas enim diam, placerat sed ligula ia maximus enim. Nulla tincidunt turpis enim, eu commodo elit blandit ut</p>
			</div>
			<div class="row artists">
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive"  src="images/backgrounds/1.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/4.jpg" alt="">
							<h3>Matthew Franklin</h3>
							<h5>Guitarist</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://facebook.com"></a></li>
									<li><a class="fa fa-facbook" href="http://twitter.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive" src="images/backgrounds/2.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/5.jpg" alt="">
							<h3>Catherine Davis</h3>
							<h5>Vocalist</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://twitter.com"></a></li>
									<li><a class="fa fa-facbook" href="http://tumblr.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive" src="images/backgrounds/3.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/6.jpg" alt="">
							<h3>Gregory Dixon</h3>
							<h5>Drummer</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://facebook.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive"  src="images/backgrounds/1.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/7.jpg" alt="">
							<h3>Matthew Franklin</h3>
							<h5>Guitarist</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://facebook.com"></a></li>
									<li><a class="fa fa-facbook" href="http://twitter.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive" src="images/backgrounds/2.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/8.jpg" alt="">
							<h3>Catherine Davis</h3>
							<h5>Vocalist</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://twitter.com"></a></li>
									<li><a class="fa fa-facbook" href="http://tumblr.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive" src="images/backgrounds/3.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/9.jpg" alt="">
							<h3>Gregory Dixon</h3>
							<h5>Drummer</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://facebook.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive" src="images/backgrounds/3.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/10.jpg" alt="">
							<h3>Gregory Dixon</h3>
							<h5>Drummer</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://facebook.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive"  src="images/backgrounds/1.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/11.jpg" alt="">
							<h3>Matthew Franklin</h3>
							<h5>Guitarist</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://facebook.com"></a></li>
									<li><a class="fa fa-facbook" href="http://twitter.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive" src="images/backgrounds/2.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/12.jpg" alt="">
							<h3>Catherine Davis</h3>
							<h5>Vocalist</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://twitter.com"></a></li>
									<li><a class="fa fa-facbook" href="http://tumblr.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="artist bordered hover-effect">
						<div class="overlay"></div>
						<img class="img-responsive" src="images/backgrounds/3.jpg" alt="">
						<div class="info-block">
							<img  class="img-responsive" src="images/members/13.jpg" alt="">
							<h3>Gregory Dixon</h3>
							<h5>Drummer</h5>
							<div class="show-on-hover">
								<p>Sed est risus, interdum id posuere et, fringilla id ipsum. Cras lacinia ipsum nisi, at sagittis leo sodales eget amet vitea</p>
								<ul class="social-networks no-bg">
									<li><a class="fa fa-facbook" href="http://facebook.com"></a></li>
									<li><a class="fa fa-facbook" href="http://youtube.com"></a></li>
									<li><a class="fa fa-facbook" href="http://spotify.com"></a></li>
									<li><a class="fa fa-facbook" href="http://soundcloud.com"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="btn-wrapper pdt-70">
				<a href="band.html" class="btn big first"><i class="fa fa-user"></i>All Members</a>
				<a href="band.html" class="btn big dark"><i class="fa fa-user"></i>New Members</a>
			</div>
		</div>

		<!-- Events -->
		<div class="events-home-wrapper">
			<div class="overlay-section">
				<div class="container section">
					<div class="section-title pdb-30">
						<h2>Upcoming Events</h2>
						<div class="sep"></div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas enim diam, placerat sed ligula ia maximus enim. Nulla tincidunt turpis enim, eu commodo elit blandit ut</p>
					</div>
					<div class="events">
						<div class="next-event-countdown">
							<ul class="events-home-countdown start_countdown clearfix" data-date="31 october 2016 12:00:00">
							    <li><span class="days">00</span><span class="timeRefDays">days</span></li>
							    <li><span class="hours">00</span><span class="timeRefHours">hours</span></li>
							    <li><span class="minutes">00</span><span class="timeRefMinutes">mins</span></li>
							    <li><span class="seconds">00</span><span class="timeRefSeconds">secs</span></li>
							</ul> 
						</div>
						<div class="event clearfix">
							<div class="date">
								<h2>31</h2>
								<p>Oct, 2016</p>
							</div>
							<h4 class="title">Nocturna Show in Bucharest</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>Sala Polivalenta, Bucharest</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn">Buy Tickets</a>
							</div>
						</div>
						<div class="event clearfix even">
							<div class="date">
								<h2>22</h2>
								<p>Nov, 2016</p>
							</div>
							<h4 class="title">Titan Slayer Live in Underground Pub</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>Mihai Viteazul, no. 5, Buzau</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn">Buy Tickets</a>
							</div>
						</div>
						<div class="event clearfix">
							<div class="date">
								<h2>29</h2>
								<p>Nov, 2016</p>
							</div>
							<h4 class="title">Clitgore at Rockstad Extreme Fest</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>Rasnov, Brasov, Romania</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn">Buy Tickets</a>
							</div>
						</div>
						<div class="event clearfix even">
							<div class="date">
								<h2>16</h2>
								<p>Dec, 2016</p>
							</div>
							<h4 class="title">K Project First Public Show in Altlantis</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>Tineretului Park, Buzau</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn">Buy Tickets</a>
							</div>
						</div>
						<div class="event clearfix">
							<div class="date">
								<h2>31</h2>
								<p>Dec, 2016</p>
							</div>
							<h4 class="title">Titan Slayer New Years Day!</h4>
							<h5 class="location"><i class="fa fa-map-marker"></i>Location no.45, Romania</h5>
							<div class="btn-wrapper">
								<a href="#" class="btn">Buy Tickets</a>
							</div>
						</div>
					</div>
					<div class="btn-wrapper pdt-70">
						<a href="#" class="btn big first"><i class="fa fa-user"></i>All Events</a>
						<a href="#" class="btn big dark"><i class="fa fa-user"></i>Past Events</a>
					</div>
				</div>
			</div>
		</div>

		

		<!-- Blog -->
		<div class="blog-home-wrapper">
			<div class="overlay-section">
				<div class="container section ">
					<div class="section-title pdb-30">
						<h2><?php echo $affiche['dernieresn'][$langue]; ?></h2>
						<div class="sep"></div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas enim diam, placerat sed ligula ia maximus enim. Nulla tincidunt turpis enim, eu commodo elit blandit ut</p>
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
											<img class="img-responsive" src="/img/<?php echo $value['img'];?>" alt="image-<?php echo $value['titre']; ?>">
										</a>
									</div>
									<a href="blog-single.html"><h3><?php echo $value['titre']; ?></h3></a>
									<h5><i class="fa fa-clock-o"></i><?php echo $value['date_insert']; ?></h5>
									<p><?php echo $value['article']; ?></p>
									<a href="blog-single.html" class="btn">Read More</a>
								</div>
							</div>
						<?php
						}
						 ?>
					</div>
					<div class="btn-wrapper pdt-70">
						<a href="blog.html" class="btn big"><i class="fa fa-user"></i>See All News</a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Recent Prodcuts -->
		<div class="recent-products-home-wrapper ">
			<div class="container section">
				<div class="section-title pdb-30">
					<h2>Recent Products</h2>
					<div class="sep"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas enim diam, placerat sed ligula ia maximus enim. Nulla tincidunt turpis enim, eu commodo elit blandit ut</p>
				</div>
				<div class="row recent-products">
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/1.jpg" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Neo T-Shirt</h5></a>
							<div class="meta">
								<h6 class="product-cat">T-Shirts</h6>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
								<h5 class="price">$25.00</h5>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/1.jpg" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Gorogot - MTBFest</h5></a>
							<div class="meta">
								<h6 class="product-cat">Tickets</h6>
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
								<img class="img-responsive" src="images/1.jpg" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Lacuna Coil - Comalies</h5></a>
							<div class="meta">
								<h6 class="product-cat">Albums</h6>
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
								<img class="img-responsive" src="images/1.jpg" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Titan Slayer - Sisters of Furry</h5></a>
							<div class="meta">
								<h6 class="product-cat">Albums</h6>
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
				</div>
			</div>
		</div>
		
		<!-- Contact -->
		<div class="contact-home-wrapper">
			<div class="overlay-section">
				<div class="container section">
					<div class="section-title pdb-60">
						<h2><?php echo $affiche['contact'][$langue]; ?></h2>
						<div class="sep"></div>
						<p><?php echo $affiche['text_conta'][$langue]; ?></p>
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
						<h2 class="newsletter-title">NEWSLETTER</h2>
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
					<h4 class="widget-title"><?php echo $affiche['apropos'][$langue]; ?></h4>
					<div class="widget-content">
						<p><?php echo $affiche['txtapropos'][$langue]; ?></p>
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