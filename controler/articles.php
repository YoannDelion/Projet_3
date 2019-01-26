<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 19:13
 */

include_once __DIR__ . '/../utils/autoloader.php';


$post = new Post();
$posts = $post->findAll();


include_once __DIR__ . '/../vue/articles.vue.php';