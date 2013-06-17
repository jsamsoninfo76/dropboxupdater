<?php
	/**
	* Liens
	* - http://www.commentcamarche.net/forum/affich-1323690-php-recuperer-le-resultat-d-un-count
	*/
	
	include("include/include.php");
	
	/* Connection DB */
	$connexion = new PDO('mysql:host='.$config['host'].';dbname='.$config['db'], $config['user'], $config['pass']);
	
	/* Récupération ID_USER */
	$sql_select = "SELECT COUNT(DISTINCT email) AS nombre FROM dropboxupdater";
	$query_select = $connexion->prepare($sql_select);
	$query_select->execute();

	/* Recuperation nombre de retour */
	if ($query_select){
		if ($query_select->rowCount())
			$data = $query_select->fetch(PDO::FETCH_ASSOC);
	}
	
	$retour['retour'] = $data["nombre"];
	
	print(json_encode($retour));
?>
