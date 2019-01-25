<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 18:59
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/autoloader.php';


$post = new Post();
$comments = new Comment();
$erreur = null;

if(isset($_GET['id']) && $_GET['id'] !== null) {
    $postId = $_GET['id'];
    $post = $post->findById($postId);
}

if($post->getId() === null) {
    $erreur = 'Ce chapitre n\'existe pas !';
} else {
    $comments = $comments->findAllByPost($post->getId());
}


include_once $_SERVER['DOCUMENT_ROOT'] . '/vue/chapitre.vue.php';