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


    <meta charset="utf-8" />
    <title>Dare Gorillaz</title>
  	</head>

    <body>
	<script type="text/javascript">
	

	$('a[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 1000);
      return false;
    }
  }
});
// scrollTo is the </script>
    <!-- Header -->
	<header id="site-header">
		<div class="container nav-wrapper">
			<!-- Main Mneu -->


			<nav id="site-navigation" class="site-navigation">
				<ul id="main-menu">
					<li class="active menu-left">
						<a href="#store">Store</a>
					</li>
					<li class="menu-left">
						<a href="#"><i class="fa fa-shopping-cart"></i></a>
					</li>
					<li class="logo_gorillaz">
						<a href="index.php"><img src="img/logo.png" alt="logo_gorillaz"></a>
					</li>
					<li class="res_s">
						<a href="https://www.instagram.com/gorillaz/"><img src="img/ig.png" alt=""></a>
					</li>
					<li class="res_s">
						<a href="https://www.facebook.com/Gorillaz/?fref=ts"><img src="img/fb.png" alt=""></a>
					</li>
					<li class="res_s">
						<a href="https://twitter.com/gorillaz?lang=fr"><img src="img/twitter.png" alt=""></a>
					</li>
					<li class="res_s">
						<a href="#"><img src="img/youtube.png" alt=""></a>
					</li>
					<li class="res_s">
						<a href="http://dare-gorillaz.tumblr.com/"><img src="img/tumblr.png" alt=""></a>
					</li>
					<li class="res_s last">
						<?php


		require_once ('connexionbdd.php'); 
		include 'fonctionsbdd.php';
		session_start();
		if (!empty($_POST)){
			$_SESSION['lang']=$_POST['l'];
		} else {
			$_SESSION['lang']='fr';
		}
		if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
			$langue='en';

			?>
			<form action="index.php" method="post" id="language">	
				<input type="hidden" name="l" value="fr" />
				<input type="submit" id="langue_fr" value="Francais">
			</form>
			<?php
		} else {
			$langue='fr';
			?>
			<form action="index.php" method="post" id="language">	
				<input type="hidden" name="l" value="en" />
				<input type="submit" id="langue_en" value="English">
			</form>
			
		<?php 
		}
		?>
		<script type="text/javascript">
			<?php echo 'var langue = "'.json_encode($_SESSION['lang']).'";'; ?>
		</script>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	
	
	<!-- Site Content -->
	<div class="site-content">	
  

	<div class="left-content">
		<img src="images/backgrounds/bg.png" alt="background img">
	</div>
    <div class="right-content">

<?php
	
	$date=recupEvent($mysql);
	$affiche=recupTexte($mysql, $langue);
	
	?>


	</br></br>
 <label id="Compte"></label>
 <script type="text/javascript">
 var Affiche=document.getElementById("Compte");
 function Rebour() {
	 var date1 = new Date();
	 var date2 = new Date ('<?php echo $date; ?>');
	 var sec = (date2 - date1) / 1000;
	 var n = 24 * 3600;
	 var langue = '<?php echo $langue; ?>';
	 if (sec > 0) {
		 j = Math.floor (sec / n);
		 h = Math.floor ((sec - (j * n)) / 3600);
		 mn = Math.floor ((sec - ((j * n + h * 3600))) / 60);
		 sec = Math.floor (sec - ((j * n + h * 3600 + mn * 60)));
		if (langue == 'fr') {
			Affiche.innerHTML = "<div class='count'><div class='numbers'>" + j +"</div><div class='letters'>days</div></div>"+ "<div class='count'><div class='numbers'>" + h +"</div><div class='letters'>hours</div></div>"+ "<div class='count'><div class='numbers'>" + mn + "</div><div class='letters'>minutes</div></div>" + "<div class='count'><div class='numbers'>" +sec + "</div><div class='letters'>seconds</div></div>";
		} else {
			Affiche.innerHTML = "<div class='count'><div class='numbers'>" + j +"</div><div class='letters'>days</div></div>"+ "<div class='count'><div class='numbers'>" + h +"</div><div class='letters'>hours</div></div>"+ "<div class='count'><div class='numbers'>" + mn + "</div><div class='letters'>minutes</div></div>" + "<div class='count'><div class='numbers'>" +sec + "</div><div class='letters'>seconds</div></div>";
		} 
	 }
	 tRebour=setTimeout ("Rebour();", 1000);
 }
 Rebour();
 </script>


<p class="fin_compte">
 <?php 
echo utf8_encode($affiche['fin_compte'][$langue]);
?>
</p>



 <form action="envoimail.php" id="contact-form" method="post">
	<label for="your-name">First-name</label>
	<input type="text" name="your-name" id="your-name" minlength="3" placeholder="Your name" required>
	<label for="email">Email</label>
	<input type="email" name="your-email" id="email" placeholder="Your email address" required>
	<button type="submit" class="btn_sub">Send</button>
</form>


<!--
<?php /*
echo('<br /><br />articles :<br />');
$article = recupArticles($mysql,$langue);
foreach ($article as $key => $value){
	?>
	<a href="<?php echo $value['lien']; ?>">
		<img src="/img/<?php echo $value['img'];?>" alt="image-<?php echo $value['titre']; ?>" />
	</a>
<?php
	echo "<br />";
	echo $value['titre'];
	echo "<br /><br />";
	echo $value['article'];
} */
 ?>
-->

 </div>
</div>
<!-- Recent Prodcuts -->
		<div id="store" class="recent-products-home-wrapper ">
			<div class="container section">
				<div class="section-title pdb-30">
					<h2>Merch</h2>
					<div class="sep"></div>
					<p>Get your gear directly from the website !</p>
				</div>
				<div class="row recent-products">
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/1.png" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Russel SHIRT</h5></a>
							<div class="meta">
								<h6 class="product-cat">S - M - L - XL - XXL</h6>
								<h5 class="price">$25.00</h5>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/2.png" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Noodles shirt</h5></a>
							<div class="meta">
								<h6 class="product-cat">S - M - L - XL - XXL</h6>
								
								<h5 class="price">$25.00</h5>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/3.png" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Murdoc shirt</h5></a>
							<div class="meta">
								<h6 class="product-cat">S - M - L - XL - XXL</h6>
								
								<h5 class="price">$25.00</h5>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/4.png" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Band 1 shirt</h5></a>
							<div class="meta">
								<h6 class="product-cat">S - M - L - XL - XXL</h6>
								
								<h5 class="price">$25.00</h5>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/5.png" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">Band 2 shirt</h5></a>
							<div class="meta">
								<h6 class="product-cat">S - M - L - XL - XXL</h6>
								
								<h5 class="price">$25.00</h5>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="product">
							<div class="bordered product-image">
								<img class="img-responsive" src="images/products/6.png" alt="">
								<div class="overlay">
									<div class="info-block">
										<a href="#" class="button"><i class="fa fa-shopping-cart"></i>Add To cart</a>
									</div>
								</div>
							</div>
							<a href="shop-single.html"><h5 class="product-title">2-D shirt</h5></a>
							<div class="meta">
								<h6 class="product-cat">S - M - L - XL - XXL</h6>
								
								<h5 class="price">$25.00</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div id="questions" style="bottom: -1px;">
			<a href="#msg">Des questions ? </a>
		</div>
			<!--
		<div id="msg" class="open" >
			<img src="img/env.png" alt="enveloppe">
			<p class="msg">Your message has been sent</p>
		</div>-->
	
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
</body>
</html>
