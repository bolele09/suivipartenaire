<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include("menu.php");
require("connexion.php");
$connect= new Connexion();
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>

<table width="200">
  <tr>
    <td>NOM LOCALITE </td>
  </tr>
  <?php
  	$mypdo=$connect->EtablirConnexion();
	if($mypdo!=false){
		$req=$mypdo->prepare('select * from localites order by nomloc');
			if($req->execute())
			{
				while( $tab=$req->fetch())
				{
					
					echo'<tr>';
					if($_GET['valeur']=='dist'){
						echo'<td class="info"><a href="distributeurs.php?idloc='.$tab['idloc'].'">'.$tab['nomloc'].'</a></td>';
						}else{
						echo'<td class="info"><a href="listepromoteurs.php?idloc='.$tab['idloc'].'">'.$tab['nomloc'].'</a></td>';
						}
						
					echo'</tr>';
					
				}
				
			}
	}
   ?>
</table>

</body>
</html>
