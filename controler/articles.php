<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 19:13
 */

include_once '../utils/bddConnexion.php';
include_once '../utils/autoloader.php';


$post = new Post();
$posts = $post->findAll();


include_once '../vue/articles.vue.php';