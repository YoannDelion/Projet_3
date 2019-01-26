<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 18:29
 */

include_once __DIR__ . '/../utils/autoloader.php';


$post = new Post();
$posts = $post->findLatest();


include_once __DIR__ . '/../vue/accueil.vue.php';