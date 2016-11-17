<?php
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