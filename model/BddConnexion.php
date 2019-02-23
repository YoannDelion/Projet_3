<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 22/01/2019
 * Time: 13:12
 */

//class BddConnexion
//{
//    /**
//     * @var PDO
//     */
//    protected $bdd;
//
//    public function __construct()
//    {
//        try {
//            $this->bdd = new PDO('mysql:host=localhost;dbname=projet3', 'root', '');
//            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        } catch (PDOException $e) {
//            die('Erreur:' . $e->getMessage());
//        };
//    }
//
//}


//En singleton pour éviter de multiplier les connexions à la bdd afin d'optimiser l'application :

class BddConnexion
{
    /**
     * @var PDO
     */
    private static $_dbInstance;

    /**
     * Constructeur
     */
    protected function __construct()
    {
        if (is_null(self::$_dbInstance) ) {
            self::$_dbInstance = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
        }
    }

    /**
     * Appel static au connecteur PDO par  BddConnexion::getInstance()
     * @return PDO
     */
    public static function getInstance() {
        if ( is_null(self::$_dbInstance) ) {
            new BddConnexion();
        }
        return self::$_dbInstance;
    }
}