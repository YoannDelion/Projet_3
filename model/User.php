<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 21/01/2019
 * Time: 18:08
 */

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     * Definit les permissions des utilisateurs
     */
    private $role;

    /**
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @param User $user
     * @return int
     * retourne 0 si erreur lors de l'ajout
     */
    public function add(User $user)
    {
        $bdd = BddConnexion::getConnexion();

        $req = $bdd->prepare('INSERT INTO user(name, password, role) VALUES(:name, :password, :role)');
        $req->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $req->bindValue(':role', $user->getRole(), PDO::PARAM_STR);
        $req->execute();
        $retour = $req->rowCount();

        return $retour;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        $bdd = BddConnexion::getConnexion();
        $listUsers = [];

        $req = $bdd->query('SELECT id, name, role FROM user');
        while($datas = $req->fetch()){
            $user = new User();
            $user->setId($datas['id']);
            $user->setName($datas['name']);
            $user->setRole($datas['role']);
            $listUsers[] = $user;
        }
        return $listUsers;
    }

    /**
     * @param $id
     * @return User
     */
    public function findById($id)
    {
        $bdd = BddConnexion::getConnexion();

        $req = $bdd->prepare('SELECT id, name, role FROM post WHERE id=:id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();

        $user = new User();
        $user->setId($data['id']);
        $user->setName($data['name']);
        $user->setRole($data['role']);

        return $user;
    }

    /**
     * @param $name
     * @param $password
     * @return User
     * Permet de savoir si l'utilisateur existe lors de la connexion
     */
    public function exist($name, $password)
    {
        $bdd = BddConnexion::getConnexion();

        $req = $bdd->prepare("SELECT id, role FROM user WHERE name = :name AND password =:password");
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch();

        $user = new User();
        $user->setId($data['id']);
        $user->setName($name);
        $user->setPassword($password);
        $user->setRole($data['role']);

        return $user;
    }

    /**
     * @param User $user
     * @return int
     * retourne 0 si erreur lors de la modification
     */
    public function update(User $user)
    {
        $bdd = BddConnexion::getConnexion();

        $req = $bdd->prepare('UPDATE user SET name=:name, password=:password, role=:role');
        $req->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $req->bindValue(':role', $user->getRole(), PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->rowCount();
        return $reponse;
    }

    /**
     * @param $id
     * @return int
     * retourne 0 si erreur lors de la suppression
     */
    public function delete($id)
    {
        $bdd = BddConnexion::getConnexion();
        $req = $bdd->prepare("DELETE FROM user WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->rowCount();
        return $reponse;
    }
}