<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 18:59
 */

include_once '../utils/bddConnexion.php';
include_once '../utils/autoloader.php';


$post = new Post();
$erreur = null;

if(isset($_GET['id']) && $_GET['id'] !== null) {
    $postId = $_GET['id'];
    $post = $post->findById($postId);
}

if($post->getId() === null) {
    $erreur = 'Ce chapitre n\'existe pas !';
}

include_once '../vue/chapitre.vue.php';