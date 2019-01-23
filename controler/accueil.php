<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 18:29
 */

include_once '../utils/bddConnexion.php';
include_once '../utils/autoloader.php';


$post = new Post();
$posts = $post->findLatest();


include_once '../vue/accueil.vue.php';