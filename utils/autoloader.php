<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 22/01/2019
 * Time: 13:09
 */

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/model/*') as $fichier) {
    include $fichier;
}
