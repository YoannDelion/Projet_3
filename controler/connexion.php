<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 24/01/2019
 * Time: 18:01
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/bddConnexion.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/autoloader.php';


$post = new Post();
$posts = $post->findLatest();


include_once $_SERVER['DOCUMENT_ROOT'] . '/vue/connexion.vue.php';