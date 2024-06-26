<?php
session_start();


$password = "monMotdePasse1234";
$password2 ="monMotdePasse1234";

// algorithme de hachage FAIBLE
$md5 = hash('md5', $password); // génère une seule version hachée du mdp, même si on appelle à nouveau la fonction hash avec le même algoritme md5
// echo $md5."<br>";

$sha256 = hash('sha256', $password); // génère également une seule version hachée du mdp, idem que md5
// echo $sha256."<br>";

// algorithme de hashage FORT (bcrypt)
/* 
    D'autres préfixes sont ajoutés au mot de passe hashé pour venir renforcer la sécurité, algo + cost + salt + hashedPassword
    on va stocker l'intégralité de cette chaîne de caractère qui constitue ce qu'on appelle l'empreinte numérique.
    Peu importe la longueur du mot de passe, cela n'a pas d'impact sur la longueur du mot de passe hashé"
    Aujourd'hui c'est en moyenne entre 80 et 90 caractères qui sont stockés pour la totalité de l'empreinte numérique.
    Note : ne pas faire de varchar inférieur à 255 pour les mdp pour cette raison. 
    Le cost est établi par l'algorithme lui même. 
    La version de l'algorithme est le premier préfixe de l'empreinte numérique. Il change selon les algorithmes utilisés. 
*/

// la fonction password_hash() créé un nouveau hachage en utilisant un alogorithme de hachage fort et irréversible
$hash = password_hash($password, PASSWORD_DEFAULT);
// echo $hash."<br>";
// Avec l'utilisation de BCRYPT, le mot de passe hashé change à chaque refresh, de façon aléatoire. 
// Par ailleurs, également à la différence des algorithmes de hashage faibles, le même mot de passe ne donnent pas le même mot de passe hashé. Le salt et le hashage sera différent pour le même mot de passe. 

$hash2 = password_hash($password, PASSWORD_ARGON2I);
$hash3 = password_hash($password2, PASSWORD_ARGON2I);
$hash4 = password_hash($password, PASSWORD_BCRYPT);

// on hashe le password avant l'ajout à la BDD


// password_verify() va permettre de comparer les empreintes numériques du mot de passe entré dans le formulaire par l'utilisateur et l'empreinte numérique stockée en BDD 


// saisie dans le formulaire de login
$saisie = "monMotdePasse1234";

$check = password_verify($saisie, $hash); // on compare les empreintes numériques du mot de passe hashé avec la saisie qui a été faite par l'utilisateur. -> renvoie un booléen
$user = "Geoff";

if(password_verify($saisie, $hash)) { // si password_verify est true -> je suis connecté
    echo "Les mots de passe correspondent !<br>";
    $_SESSION["user"] = $user; // le fait d'être connecté est matérialisé par la mise en session de notre utilisateur
    echo $user." est connecté !<br>";
} else {
    echo "Les mots de passe sont différents !";
}

