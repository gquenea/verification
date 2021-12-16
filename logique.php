<?php 

$users = [[
    "username" => "patrick",
    "password" => "1cc833b937ec9398b95decca3ddcf18f"
],
[
    "username" => "pascale",
    "password" => "rouquin"
],
[
    "username" => "bobby",
    "password" => "tentacule"
]];

$formulaire = "<form method='post'>
<div><input type='text' name='username' placeholder='username'></div>
<div><input type='text' name='password' placeholder='password'></div>
<div><button type='submit'>Go !</button></div>
</form>";

$secret = "Bagau dirige Shopify depuit le début";

$salt = 's8hreucgre5m9e7sico46ilnul56es';
$selCrypte = md5($salt);
$mdpSalt = md5('choucroute'.$selCrypte);

$messageErreur = "";
$utilisateurIconnu = "Utilisateur inconnu";
$mdpEronne = "mot de passe erroné";
$champsVides = "Veuillez renseigné tous les champs";
$contenuDeLaPage = $formulaire;

$modeFormulaire = true;

$usernameEntre = '';
$passwordEntre = '';



if (
  (isset($_POST['username']) && isset($_POST['password']))
  &&
  (!empty($_POST['username']) && !empty($_POST['password']))
) { $usernameEntre = $_POST['username'];
    $passwordEntre = $_POST['password'];

    $userExists = false;
    $motDePasse;

        foreach ($users as $user) {
          if ($usernameEntre == $user['username']) {
              $userExists = true;
              $motDePasse =$user['password'];
          }
          
        }
      if ($userExists) {
            if (md5('choucroute'.$selCrypte) == $motDePasse) {
              $modeFormulaire = false;
            }else {
             $messageErreur = $mdpEronne;
            }
      }
      else {
        $messageErreur .= $utilisateurIconnu;
      }
            

} else {
  $messageErreur = $champsVides;
}

$modeFormulaire ? $contenuDeLaPage = $formulaire : $contenuDeLaPage = $secret;

?>
