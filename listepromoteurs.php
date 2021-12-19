<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<?php 
include("menu.php");
require("connexion.php");
$connect= new Connexion();
?>

</head>


<body>
<table width="200" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
  <td>ID</td>
    <td>NOM</td>
    <td>PRENOM</td>
    <td>LOGIN</td>
    <td>NUMERO</td>
	 
  </tr>
  <?php
  	$mypdo=$connect->EtablirConnexion();
	if($mypdo!=false){
		$req=$mypdo->prepare('select * from promoteurs order by nomprom');
			if($req->execute())
			{
				while( $tab=$req->fetch())
				{
					
					echo'<tr>';
						echo'<td class="info">
							<a href="affectation.php?idprom='.$tab['idpromoteur'].'&idloc='.$_GET['idloc'].'">'.$tab['idpromoteur'].'</a>
							</td>';
						echo'<td class="info">'.$tab['nomprom'].'</td>';
						echo'<td class="info">'.$tab['prenprom'].'</td>';
						echo'<td class="info">'.$tab['loginprom'].'</td>';
						echo'<td class="info">'.$tab['numerombegte'].'</td>';
					echo'</tr>';
					
				}
				
			}
	}
   ?>
</table>

</body>
</html>
