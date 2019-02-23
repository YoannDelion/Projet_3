<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 18:29
 */

include_once __DIR__ . '/../utils/autoloader.php';


$title = "Accueil";
$post = new Post();

//On récupère les trois derniers posts publiés
$posts = $post->findByPage(3,0);


include_once __DIR__ . '/../vue/accueil.vue.php';