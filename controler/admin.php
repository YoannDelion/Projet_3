<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 24/01/2019
 * Time: 17:59
 */

include_once __DIR__ . '/../utils/autoloader.php';

session_start();


if (!isset($_SESSION['identifiant'])) {
    header('Location: /connexion');
    exit();
}


include_once __DIR__ . '/../vue/admin.vue.php';