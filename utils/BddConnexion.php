<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 22/01/2019
 * Time: 13:12
 */

class BddConnexion
{
    public static function getConnexion()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet3', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erreur:' . $e->getMessage());
        };
        return $bdd;
    }

}