<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 02/02/2019
 * Time: 10:11
 */

include_once __DIR__ . '/../utils/autoloader.php';


session_start();
if (!isset($_SESSION['identifiant'])) {
    header('Location: /connexion');
    exit();
}


if (isset($_POST['envoyer']) && $_POST['envoyer'] === 'envoyer') {
    $erreursForm = Array();

    //title
    if (isset($_POST['title'])) {
        $title = ucfirst(strtolower(trim($_POST['title'])));
    } else {
        $title = '';
    }
    if (strlen($title) === 0) {
        $erreursForm['title'] = "Le titre du chapitre est obligatoire";
    } elseif (strlen($title) < 2) {
        $erreursForm['title'] = 'Le champ est trop court';
    } elseif (strlen($title) > 255) {
        $erreursForm['title'] = 'Le champ est trop long';
    }

    //content
    if (isset($_POST['content'])) {
        $content = trim($_POST['content']);
    } else {
        $content = '';
    }
    if (strlen($content) === 0) {
        $erreursForm['content'] = "Le contenu ne peut pas être vide !";
    } elseif (strlen($content) < 2) {
        $erreursForm['content'] = 'Le champ est trop court';
    }

    if (count($erreursForm) === 0) {
        //ajout du nouveau post en bdd
        $addPost = new Post();
        $addPost->setAuthor($_SESSION['identifiant']);
        $addPost->setTitle($title);
        $addPost->setContent($content);

        $retour = $addPost->add($addPost);

        if ($retour == 0) {
            $erreursForm['insertion'] = "Erreur lors de l'ajout, merci de réessayer";
        } else {
            $erreursForm['success'] = 'Le chapitre a bien été publié !';
        }
        //On vide la variable post, pour éviter que l'admin ré envoie le même post
        unset($_POST);
    }
}


include_once __DIR__ . '/../vue/addPost.vue.php';