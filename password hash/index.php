<?php

$password = "monMotdePasse1234";

// algorithme de hachage FAIBLE
$md5 = hash('md5', $password); // génère une seule version hachée du mdp, même si on appelle à nouveau la fonction hash avec le même algoritme md5
echo $md5."<br>";

$sha256 = hash('sha256', $password); // génère également une seule version hachée du mdp, idem que md5
echo $sha256."<br>";

// algorithme de hashage FORT
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
echo $hash."<br>";
// Avec l'utilisation de BCRYPT, le mot de passe hashé change à chaque refresh, de façon aléatoire. 
// Par ailleurs, également à la différence des algorithmes de hashage faibles, le même mot de passe ne donnent pas le même mot de passe hashé. Le salt et le hashage sera différent pour le même mot de passe. 
