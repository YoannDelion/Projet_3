<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 22/01/2019
 * Time: 13:09
 */

spl_autoload_register(function ($class) {
    include_once __DIR__ . '/../model/' . $class . '.php';
});
