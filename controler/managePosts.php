<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 02/02/2019
 * Time: 10:43
 */

include_once __DIR__ . '/../utils/autoloader.php';

session_start();

if (!isset($_SESSION['identifiant'])) {
    header('Location: /connexion');
    exit();
}

$posts = new Post();

if (isset($_GET['action']) && ($_GET['action'] == "supprimer")) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $return = $posts->delete($id);
        if ($return != 0) {
            $success = "Chapitre supprimé avec succès";
        } else {
            $error = "Une erreur est survenue merci de réessayer";
        }
    } else {
        $error = "Une erreur est survenue merci de réessayer";
    }
} elseif (isset($_GET['action']) && ($_GET['action'] == "modifier")) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

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
                $updatePost = new Post();
                $updatePost->setAuthor($_SESSION['identifiant']);
                $updatePost->setTitle($title);
                $updatePost->setContent($content);
                $updatePost->setId($id);

                $retour = $updatePost->update($updatePost);

                if ($retour == 0) {
                    $erreursForm['insertion'] = "Erreur lors de la modification, merci de réessayer";
                } else {
                    $erreursForm['success'] = 'Le chapitre a bien été modifié !';
                }
                unset($_POST);
            }
        }

        $postToUpdate = new Post();
        $postToUpdate = $postToUpdate->findById($id);

    } else {
        $error = "Une erreur est survenue merci de réessayer";
    }
}


$posts = $posts->findAll();

include_once __DIR__ . '/../vue/managePost.vue.php';