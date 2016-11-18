<?php

function recupEvent($mysql){
	$req = $mysql->prepare("SELECT date, heure FROM administration WHERE ville='Paris'");
	$req->execute();
	if($req->rowCount()>=1) {
		while ($donnees = $req->fetch()){
			$date=$donnees['date'];
			$heure=$donnees['heure'];
			$date3=$date.', '.$heure;
		}
	}
	return $date3;
}

function recupTexte($mysql, $langue) {
	$req2 = $mysql->prepare("SELECT description, ".$langue." FROM contenu");
	$req2->execute();
	if($req2->rowCount()>=1) {
		while ($donnees = $req2->fetch()){
			$affiche[$donnees['description']]=$donnees;
		}
	}
	return $affiche;
}

function recupArticles($mysql, $langue) {
	$req3 = $mysql->prepare("SELECT titre_".$langue.", ".$langue.", lien, image, date_insert FROM articles order by date_insert desc");
	$req3->execute();
	if($req3->rowCount()>=1){
		$i=0;
		while ($donnees = $req3->fetch()) {
			switch ($langue){
				case 'fr':
					$reponse[$i]['titre']=utf8_encode($donnees['titre_fr']);
					$reponse[$i]['article']=utf8_encode($donnees['fr']);
					break;
				case 'en':
					$reponse[$i]['titre']=utf8_encode($donnees['titre_en']);
					$reponse[$i]['article']=utf8_encode($donnees['en']);
					break;
			}
			$reponse[$i]['lien']=$donnees['lien'];
			$reponse[$i]['img']=$donnees['image'];
			$i++;
		}
	}
	return $reponse;
}