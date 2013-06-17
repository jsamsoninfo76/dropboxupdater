<?php
/**
 * Ajout d'un email
 * 
 * SQL
 * CREATE TABLE IF NOT EXISTS `dropboxupdater` (
 * `id_user` int(11) NOT NULL AUTO_INCREMENT,
 * `email` varchar(255) DEFAULT NULL,
 * `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 * PRIMARY KEY (`id_user`)
 * ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;
 *
 * 1) Récupération des informations envoyées par l'application (login & mdp)
 * 2) Récupération des informations sur la demande (longitude, latitude, description)
 * 3) Connection DB
 * 4) Verification longitude latitude
 * 5) Ajout de la demande
 * 6) Création répertoir de la demande
 * 7) result
 * 
 * Liens : 
 * - http://php.net/manual/fr/function.mail.php
 */

include("include/include.php");
	
/* Connection DB */
$connexion = new PDO('mysql:host='.$config['host'].';dbname='.$config['db'], $config['user'], $config['pass']);

/* Récupération des informations envoyées par l'application */
$email = $_POST['email'];

$sql_select = "SELECT * FROM dropboxupdater WHERE email='$email'";
$query_select = $connexion->prepare($sql_select);
$query_select->execute();
$nombre=$query_select->rowCount();

if (!empty($email) && $nombre < 1){
	$sql_insert = "INSERT INTO dropboxupdater(email) VALUES('$email')";
	$query_insert = $connexion->prepare($sql_insert);
	$query_insert->execute();
			
	if ($query_insert){
		sendEmail($email);
		sendEmailToMe($email);
		$retour['retour'] = "thanks";
	}
	else{
		$retour['retour'] = "erreurInsert";
	}
	
}else{
	$retour['retour'] = "emailAlreadyExist";
}


print(json_encode($retour));

?>
