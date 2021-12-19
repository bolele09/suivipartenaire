<?php 
 	class Connexion
	{	
		//creation des attributs
		var $nserv="localhost";
		var $nbd="suivipartenaire";
		var $login="root";
		var $mdp="";
		
		function EtablirConnexion()
		{
			// si la connexion reussi
			if($connect= new PDO('mysql:host='.$this->nserv.';dbname='.$this->nbd,$this->login, $this->mdp))
			
				{
					 return $connect;
				}
			else
			// echec de la connexion
				{
					return false;
				}
				
		}
			
	}
?>