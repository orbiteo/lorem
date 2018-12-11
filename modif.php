<?php
session_start();
include_once('define.php');
if($_POST) { //Si du contenu est sauvegardé
	var_dump($_POST);
	if(!empty($_SESSION['projet_id']) || !empty($_SESSION['user_id'])) { //Vérifier que $_SESSION['projet_id'] et $_SESSION['user_id'] non vide:
		foreach ($_POST as $name => $value) { // boucle pour tous les input textes
			//if($value != "") {
				$texte = "/^texte/";
				if(preg_match($texte, $name)) { //si c'est un texte on créé une ligne dans la table textes
					$nouveauTexte = new Textes();
					$arrayInfos = array('projet_id' => $_SESSION['projet_id'], 'name' => $name);
					$tableTexte = $nouveauTexte->readArray($arrayInfos);
					if(!empty($tableTexte)) {
						foreach($tableTexte as $ligneReecrite) {
							$ligneReecrite->setdescription($value);
							$ligneReecrite->insert();
							$ligneReecrite->readObject();
							$id_texte = $ligneReecrite->gettexte_id();
						}
					}
					else {
						$nouveauTexte->setname($name);
						$nouveauTexte->setdescription($value);
						$nouveauTexte->setprojet_id($_SESSION['projet_id']);
						$nouveauTexte->insert();
						$nouveauTexte->readObject();
						$id_texte = $nouveauTexte->gettexte_id();
					}

					$nouvelleModif = new Modifications();
					$nouvelleModif->settexte_id($id_texte);
					$nouvelleModif->setimage_id(0);
					$nouvelleModif->setdate_modif(date('Y-m-d'));
					$nouvelleModif->insert();
					$nouvelleModif->readObject();
					$modif_id = $nouvelleModif->getmodif_id();

					$nouvelLum = new Lien_users_modifs();
					$nouvelLum->setuser_id($_SESSION['user_id']);
					$nouvelLum->setmodif_id($modif_id);
					$nouvelLum->insert();
				}
			//}
		}
		foreach ($_FILES as $key => $value) { // boucle pour tous les input file
			if($value['name'] != "") {
				$image = "/^image/";
				if(preg_match($image, $key)) {
					if($value['size'] > 250000) {//Vérifier le poids de l'image avant enregistrement:
						header('location:'.ADRESSE_SITE.'/contenu.php?err=2');
						exit();
					}
					$nom_photo = $value['name'];
					$photo_bdd = ADRESSE_SITE.'/visuels/' . $nom_photo;
					$photo_dossier = URL.'/visuels/' . $nom_photo;
					copy($value['tmp_name'], $photo_dossier);

					$nouvelleImage = new Images();
					$arrayInfos = array('projet_id' => $_SESSION['projet_id'], 'name' => $key);
					$tableImage = $nouvelleImage->readArray($arrayInfos);
						if(!empty($tableImage)) {
							foreach($tableImage as $ligneReecrite) {
								$ligneReecrite->seturl($photo_bdd);
								$ligneReecrite->insert();
								$ligneReecrite->readObject();
								$id_image = $ligneReecrite->getimage_id();
							}
						}
						else {
							$nouvelleImage->setname($key);
							$nouvelleImage->seturl($photo_bdd);
							$nouvelleImage->setprojet_id($_SESSION['projet_id']);
							$nouvelleImage->insert();
							$nouvelleImage->readObject();
							$id_image = $nouvelleImage->getimage_id();
						}

						$nouvelleModif = new Modifications();
						$nouvelleModif->setimage_id($id_image);
						$nouvelleModif->settexte_id(0);
						$nouvelleModif->setdate_modif(date('Y-m-d'));
						$nouvelleModif->insert();
						$nouvelleModif->readObject();
						$modif_id = $nouvelleModif->getmodif_id();

						$nouvelLum = new Lien_users_modifs();
						$nouvelLum->setuser_id($_SESSION['user_id']);
						$nouvelLum->setmodif_id($modif_id);
						$nouvelLum->insert();
				}
			}
		}

		if(is_numeric($nouvelleModif->getmodif_id())) { //petite vérif qu'un nouvel id bien créé avant retour page.
			header('location:'.ADRESSE_SITE.'/contenuIya.php');
		}
		else {
			header('location:'.ADRESSE_SITE.'/contenuYia.php?err=1');
		}
	} //Sinon on renvoie vers la connexion:
	else {
		session_destroy();   
		header('location:'.ADRESSE_SITE.'/index.php');
	}
}