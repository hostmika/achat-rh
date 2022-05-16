

<?php
session_start();
include('connexion_base.php');

if(isset($_POST['login']) and isset($_POST['pass']) )
{

 $login = htmlspecialchars($_POST['login']);
 $mdp = $_POST['pass'];

 $sql=$conn->prepare("SELECT * from utilisateur_rh where login=? and mdp=? ");
 $sql->execute( array($login , $mdp));
 $userexist = $sql->rowCount();
		if($userexist == 1) {
			$userinfo = $sql->fetch();
			$_SESSION['idRh'] = $userinfo['id'];
			$_SESSION['nomRh'] = $userinfo['nom'];
			header ("Location:acceuilRh.php");
		}else {
			$erreur = "mot de passe ou identifiant errone";
			header("Location:loginRh.php");
		}
 

}


?>