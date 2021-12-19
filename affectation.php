<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php 
include("menu.php");
require("connexion.php");
$connect= new Connexion();
?>
<title>affectation
</title>
</head>

<body>
<?php 
  $mypdo=$connect->EtablirConnexion();
	if($mypdo!=false)
	{	
		$reqlocalite=$mypdo->prepare("select * from localites where idloc='".$_GET['idloc']."'");
		$reqpromo=$mypdo->prepare("select * from promoteurs where idpromoteur='".$_GET['idprom']."'");
		$reqlocalite->execute();
		$reqpromo->execute();
	}
?>
<form action="affectation.php" method="post">

<table width="401" align="center">
<tr>
    <td width="178"></td>
    <td width="211">&nbsp;</td>
  </tr>
  <tr>
    <td width="178"></td>
    <td width="211"><label>
      <input name="idloc" type="text" id="idloc"  value="<?php echo $_GET['idloc']?>"/>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input name="idprom" type="text" id="idprom" value="<?php echo $_GET['idprom']?> "/>
    </label></td>
  </tr>
  <tr>
    <td><input name="enreg" type="submit" id="enreg" value="Enregistrer" /></td>
    <td><label></label></td>
  </tr>
</table>
</form>
</body>
</html>
