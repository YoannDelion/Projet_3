<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 18:59
 */

include_once __DIR__ . '/../utils/autoloader.php';


$post = new Post();
$comments = new Comment();
$erreur = null;

if (isset($_GET['id']) && $_GET['id'] !== null) {
    $postId = $_GET['id'];
    $post = $post->findById($postId);
}

if ($post->getId() === null) {
    $erreur = 'Ce chapitre n\'existe pas !';
} else {
    if (isset($_POST['envoyer']) && $_POST['envoyer'] === 'envoyer') {
        $erreursForm = Array();

        //author
        if (isset($_POST['author'])) {
            $author = ucwords(strtolower(trim($_POST['author'])));
        } else {
            $author = '';
        }
        if (strlen($author) === 0) {
            $erreursForm['author'] = "Un nom, prénom ou pseudo est obligatoire";
        } elseif (strlen($author) < 2) {
            $erreursForm['author'] = 'Le champ est trop court';
        } elseif (strlen($author) > 50) {
            $erreursForm['author'] = 'Le champ est trop long';
        }

        //comment
        if (isset($_POST['comment'])) {
            $comment = trim($_POST['comment']);
        } else {
            $comment = '';
        }
        if (strlen($comment) === 0) {
            $erreursForm['comment'] = "Le commentaire ne peut pas être vide !";
        } elseif (strlen($comment) < 2) {
            $erreursForm['comment'] = 'Le champ est trop court';
        }
//    elseif (strlen($comment) > 50) {
//        $erreursForm['comment'] = 'Le champ est trop long';
//    }

        if (count($erreursForm) === 0) {
            //ajout du nouveau commentairen bdd
            $addComment = new Comment();
            $addComment->setPostId($post->getId());
            $addComment->setAuthor($author);
            $addComment->setComment($comment);

            $retour = $addComment->add($addComment);

            if ($retour == 0) {
                $erreursForm['insertion'] = "Erreur lors de l'ajout, merci de réessayer";
            } else {
                $erreursForm['success'] = 'Votre commentaire a bien été envoyé !';
            }
        }
    }

    if (isset($_POST['report']) && $_POST['report'] === 'report') {
        $reportedComment = $_POST['reportedComment'];
        $retour = $comments->report($reportedComment);
        if ($retour == 0) {
            $erreurReport = 'Une erreur est survenue, merci de réessayer';
        } else {
            $successReport = 'Le commentaire a bien été signalé !';
        }
    }

    $comments = $comments->findAllByPost($post->getId());
}


include_once __DIR__ . '/../vue/chapitre.vue.php';