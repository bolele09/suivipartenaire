<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php 
include("menu.php");
require("connexion.php");
$connect= new Connexion();
?>
<title>PROMOTEURS</title>
</head>

<body>
  <form action="promoteurs.php" method="post">
      <table width="458" align="center">
        <tr>
          <td width="179">NOM PROMOTEUR</td>
          <td width="263"><label>
            <input name="nom" type="text" id="nom" size="40" />
          </label></td>
        </tr>
        <tr>
          <td>PRENOM PROMOTEUR</td>
          <td><label>
            <input name="prn" type="text" id="prn" size="40" />
          </label></td>
        </tr>
        <tr>
          <td>LOGIN </td>
          <td><label>
            <input name="log" type="text" id="log" size="40" />
          </label></td>
        </tr>
        <tr>
          <td>NUMERO</td>
          <td><label>
            <input name="numero" type="text" id="numero" size="40" />
          </label></td>
        </tr>
        
        <tr>
          <td></td>
          <td><label>
          <input name="iddist" type="text" id="iddist" size="40" />
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
      $nom =strtoupper($_POST['nom']);
      $prenom =strtoupper($_POST['prn']);
      $login =strtoupper($_POST['log']);
      $num =strtoupper($_POST['numero']);
      
      
      $mypdo=$connect->EtablirConnexion();
      if($mypdo!=false)
      {
        $req=$mypdo->prepare("insert into promoteurs values('','$nom','$prenom','$login','$num')");
        if($req->execute())
        {
          echo'<font  color="green" ><center><b> Enregistrement effectu� avec succ�s!</b></center></font>';
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
