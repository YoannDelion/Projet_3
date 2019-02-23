<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 24/01/2019
 * Time: 18:01
 */

include_once __DIR__ . '/../utils/autoloader.php';


session_start();

$title='Connexion';

if (isset($_SESSION['identifiant'])) {
    header('Location: /admin');
    exit();
}

if (isset($_POST['connexion']) && $_POST['connexion'] == 'connexion') {
    $erreur = 0;

    //identifiant
    if (isset($_POST['identifiant'])) {
        $identifiant = strtolower(trim($_POST['identifiant']));
    } else {
        $identifiant = '';
    }

    //password
    if (isset($_POST['password'])) {
        $password = strtolower(trim($_POST['password']));
    } else {
        $password = '';
    }


    if (strlen($identifiant) == 0 || strlen($password) == 0) {
        $erreur++;
        echo 'die';
        die();
    } else {
        $user = new User();
        $user = $user->exist($identifiant, $password);
    }

    if ($user->getId() !== null) {
        $_SESSION['identifiant'] = $user->getName();
        header('Location: /admin');
        exit();
    } else {
        $erreur++;
    }


}


include_once __DIR__ . '/../vue/connexion.vue.php';