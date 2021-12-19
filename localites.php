<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include("menu.php");
require("connexion.php");
$connect= new Connexion();
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Localites</title>
</head>

<body>

<form action="localites.php" method="post">

<table width="476" align="center">
  <tr>
    <td width="126">NOM LOCALITE </td>
    <td width="338"><label>
      <input name="nomloc" type="text" id="nomloc" size="50" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input name="enreg" type="submit" id="enreg" value="ENREGISTRER" />
    </label></td>
  </tr>
</table>
</form>
<?php 
 	if (isset($_POST['enreg']))
	{
		$svg=strtoupper($_POST['nomloc']);
		$mypdo=$connect->EtablirConnexion();
		if($mypdo!=false)
		{
			$req=$mypdo->prepare("insert into localites values('','$svg')");
			if($req->execute())
			{
				echo'<font  color="green" ><center><b> Enregistrement effectué avec succés!</b></center></font>';
			}
			else
			{
				echo'Erreur Enregistrement';
			}
		}
		else
		{
			echo'Erreur Connexion';
		}
		
	}
?>


</body>
</html>
