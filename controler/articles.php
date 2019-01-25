<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 23/01/2019
 * Time: 19:13
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/autoloader.php';


$post = new Post();
$posts = $post->findAll();


include_once $_SERVER['DOCUMENT_ROOT'] . '/vue/articles.vue.php';