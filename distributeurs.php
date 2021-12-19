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

<form action="distributeurs.php" method="post">
<table width="368" align="center">
  <tr>
    <td width="167">NOM</td>
    <td width="189"><label>
      <input name="nom" type="text" id="nom" requrired />
    </label></td>
  </tr>
  <tr>
    <td>PRENOM</td>
    <td><label>
      <input name="prn" type="text" id="prn" requrired/>
    </label></td>
  </tr>
  <tr>
    <td>LOGIN</td>
    <td><label>
      <input name="log" type="text" id="log"  requrired/>
    </label></td>
  </tr>
  <tr>
    <td>NUMERO</td>
    <td><label>
      <input name="numero" type="text" id="numero" requrired/>
    </label></td>
  </tr>
  <tr>
    <td></td>
    <td><label>
	<?php 
	if(isset($_GET['idloc'])){
	?>
		<input name="idlocalite" type="hidden" id="numero" value="<?php echo $_GET['idloc']?>"  required/>
	<?php
	}else{
		?>
		<input name="idlocalite" type="hidden" id="numero"  required/>
	<?php
	}
	?>
      
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
    <input name="enreg" type="submit" id="enreg" value="ENREGISTRER" />
    </label></td>
  </tr>
</table>

<div align="center"></div>
</form>
<?php 
 	if (isset($_POST['enreg']))
	{
		$nom =strtoupper($_POST['nom']);
		$prenom =strtoupper($_POST['prn']);
		$login =strtoupper($_POST['log']);
		$num =strtoupper($_POST['numero']);
		$id= $_POST['idlocalite'];
		
		
		$mypdo=$connect->EtablirConnexion();
		if($mypdo!=false)
		{
			$req=$mypdo->prepare("insert into promoteurs values('','$nom','$prenom','$login','$num','$id')");
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
