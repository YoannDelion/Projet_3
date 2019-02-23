<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 04/02/2019
 * Time: 18:31
 */

include_once __DIR__ . '/../utils/autoloader.php';


session_start();
if (!isset($_SESSION['identifiant'])) {
    header('Location: /connexion');
    exit();
}

$title='Administration - Gestion des commentaires';

$reports = new Comment();

if(isset($_GET['id']) && $_GET['id'] != null){
    $id = $_GET['id'];
    if (isset($_GET['action']) && $_GET['action']=='valider') {
        //valider le commentaire
        $retour = $reports->unreport($id);
    }
    elseif (isset($_GET['action']) && $_GET['action']=='supprimer') {
        //supprimer le commentaire
        $retour = $reports->delete($id);
    }
    if ($retour == 0) {
        $erreur = "Une erreur est survenue, merci de réessayer";
    } else {
        $success = 'La modification a bien été enregistrée !';
    }
} 

$reports = $reports->findAllReported();


include_once __DIR__ . '/../vue/manageComments.vue.php';