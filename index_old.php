<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Dare Gorillaz</title>
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
			<form action="" method="post">	
				<input type="hidden" name="l" value="fr" />
				<input type="submit" id="langue_fr" value="Francais">
			</form>
			<?php
		} else {
			$langue='fr';
			?>
			<form action="" method="post">	
				<input type="hidden" name="l" value="en" />
				<input type="submit" id="langue_en" value="English">
			</form>
			
		<?php 
		}
		?>
		<script type="text/javascript">
			<?php echo 'var langue = "'.json_encode($_SESSION['lang']).'";'; ?>
		</script>
    </head>

    <body>
    

<?php
	
	$date=recupEvent($mysql);
	$affiche=recupTexte($mysql, $langue);
	echo $affiche['bonjour'][$langue];
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
			Affiche.innerHTML = j +" j "+ h +" h "+ mn +" min "+ sec + " s";
		} else {
			Affiche.innerHTML = j +" d "+ h +" h "+ mn +" min "+ sec + " s";
		} 
	 }
	 tRebour=setTimeout ("Rebour();", 1000);
 }
 Rebour();
 </script>
 <form action="envoimail.php" id="contact-form" method="post">
	<p>Dear Erlen,</p>
	<p>My
		<label for="your-name">name</label> is
		<input type="text" name="your-name" id="your-name" minlength="3" placeholder="(your name here)" required> and
	</p>

	<p>my
		<label for="email">email address</label> is
		<input type="email" name="your-email" id="email" placeholder="(your email address)" required>
	</p>

	<p> I have a
		<label for="your-message">message</label> for you,
	</p>
	<p>
		<textarea name="your-message" id="your-message" placeholder="(your msg here)" class="expanding" required></textarea>
	</p>
	<p>
		<button type="submit">Envoyer</button>
  </p>
</form>
 <?php 
echo utf8_encode($affiche['fin_compte'][$langue]);
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
}
 ?>
    </body>
</html>
