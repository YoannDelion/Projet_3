<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 21/01/2019
 * Time: 18:08
 */

class User extends BddConnexion
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
     * @param User $user
     * @return int
     * retourne 0 si erreur lors de l'ajout
     */
    public function add(User $user)
    {
        $req = $this->bdd->prepare('INSERT INTO user(name, password) VALUES(:name, :password)');
        $req->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $req->execute();
        $retour = $req->rowCount();

        return $retour;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        $listUsers = [];

        $req = $this->bdd->query('SELECT id, name FROM user');
        while ($datas = $req->fetch()) {
            $user = new User();
            $user->setId($datas['id']);
            $user->setName($datas['name']);
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
        $req = $this->bdd->prepare('SELECT id, name FROM user WHERE id=:id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();

        $user = new User();
        $user->setId($data['id']);
        $user->setName($data['name']);

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
        $user = new User();

        $req = $this->bdd->prepare("SELECT id, name, password FROM user WHERE name = :name ");
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch();
        if ( password_verify($password, $data['password'])) {
            $user->setId($data['id']);
            $user->setName($data['name']);
            $user->setPassword($data['password']);
        }

        return $user;
    }

    /**
     * @param User $user
     * @return int
     * retourne 0 si erreur lors de la modification
     */
    public function update(User $user)
    {
        $req = $this->bdd->prepare('UPDATE user SET name=:name, password=:password WHERE id=:id');
        $req->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $req->bindValue(':id', $user->getId(), PDO::PARAM_INT);
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
        $req = $this->bdd->prepare("DELETE FROM user WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->rowCount();

        return $reponse;
    }
}