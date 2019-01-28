<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 19:13
 */

include_once __DIR__ . '/../utils/autoloader.php';


$post = new Post();
$nbPosts = $post->findAll();
$nbPosts = count($nbPosts);

//définit le nombre de posts par pages
$postsParPage = 2;

$nbPages = $nbPosts/$postsParPage;

if (!(isset($_GET['page'])) || !(is_numeric($_GET['page'])) || $_GET['page']<0 || $_GET['page']>ceil($nbPages) || $_GET['page']==0) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$offset = $postsParPage * ($page-1);
$posts = $post->findByPage($offset);


include_once __DIR__ . '/../vue/articles.vue.php';