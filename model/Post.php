<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 21/01/2019
 * Time: 18:13
 */

class Post
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var boolean
     * * vaut true si le post a été modifié
     */
    private $updated;

    /**
     * @var DateTime|null
     */
    private $updatedAt;

    /**
     * @var boolean
     * vaut true si le post a été signalé
     */
    private $reported;

    /**
     * @var DateTime|null
     */
    private $reportedAt;


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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return bool
     */
    public function isUpdated()
    {
        return $this->updated;
    }

    /**
     * @param bool $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime|null $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return bool
     */
    public function isReported()
    {
        return $this->reported;
    }

    /**
     * @param bool $reported
     */
    public function setReported($reported)
    {
        $this->reported = $reported;
    }

    /**
     * @return DateTime|null
     */
    public function getReportedAt()
    {
        return $this->reportedAt;
    }

    /**
     * @param DateTime|null $reportedAt
     */
    public function setReportedAt($reportedAt)
    {
        $this->reportedAt = $reportedAt;
    }

    /**
     * @param Post $post
     * @return int
     * retourne 0 si erreur lors de l'ajout
     */
    public function add(Post $post)
    {
        $bdd = BddConnexion::getConnexion();

        $req = $bdd->prepare('INSERT INTO post(author, title, content, createdAt) VALUES(:author, :title, :content, NOW())');
        $req->bindValue(':author', $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $req->execute();
        $retour = $req->rowCount();

        return $retour;
    }

    /**
     * @return Post[]
     */
    public function findAll()
    {
        $bdd = BddConnexion::getConnexion();
        $listPosts = [];

        $req = $bdd->query('SELECT id, author, title, content, createdAt, updated, updatedAt, reported, reportedAt FROM post');
        while($datas = $req->fetch()){
            $post = new Post();
            $post->setId($datas['id']);
            $post->setAuthor($datas['author']);
            $post->setTitle($datas['title']);
            $post->setContent($datas['content']);
            $post->setCreatedAt($datas['createdAt']);
            $post->setUpdated($datas['updated']);
            $post->setUpdatedAt($datas['updatedAt']);
            $post->setReported($datas['reported']);
            $post->setReportedAt($datas['reportedAt']);
            $listPosts[] = $post;
        }
        return $listPosts;
    }

    /**
     * @return Post[]
     * recupère les trois derniers posts insérés en base
     */
    public function findLatest()
    {
        $bdd = BddConnexion::getConnexion();
        $listPosts = [];

        $req = $bdd->query('SELECT id, author, title, content, createdAt, updated, updatedAt, reported, reportedAt FROM post ORDER BY id DESC LIMIT 0,3');
        while($datas = $req->fetch()){
            $post = new Post();
            $post->setId($datas['id']);
            $post->setAuthor($datas['author']);
            $post->setTitle($datas['title']);
            $post->setContent($datas['content']);
            $post->setCreatedAt($datas['createdAt']);
            $post->setUpdated($datas['updated']);
            $post->setUpdatedAt($datas['updatedAt']);
            $post->setReported($datas['reported']);
            $post->setReportedAt($datas['reportedAt']);
            $listPosts[] = $post;
        }
        return $listPosts;
    }

    /**
     * @param $id
     * @return Post
     */
    public function findById($id)
    {
        $bdd = BddConnexion::getConnexion();

        $req = $bdd->prepare('SELECT id, author, title, content, createdAt, updated, updatedAt, reported, reportedAt FROM post WHERE id=:id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();

        $post = new Post();
        $post->setId($data['id']);
        $post->setAuthor($data['author']);
        $post->setTitle($data['title']);
        $post->setContent($data['content']);
        $post->setCreatedAt($data['createdAt']);
        $post->setUpdated($data['updated']);
        $post->setUpdatedAt($data['updatedAt']);
        $post->setReported($data['reported']);
        $post->setReportedAt($data['reportedAt']);

        return $post;
    }

    /**
     * @param Post $post
     * @return int
     * retourne 0 si erreur lors de la mise a jour
     */
    public function update(Post $post)
    {
        $bdd = BddConnexion::getConnexion();

        $req = $bdd->prepare('UPDATE post SET title=:title, content=:content, updated=true, updatedAt=NOW()');
        $req->bindValue(':title', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->rowCount();
        return $reponse;
    }


    /**
     * @param $postId
     * @return int
     * retourne 0 si erreur lors de la mise a jour
     * enregistre le signalement et sa date
     */
    public function report($postId)
    {
        $bdd = BddConnexion::getConnexion();
        $req = $bdd->prepare("UPDATE post SET reported=true,  reportedAt=NOW(), WHERE id=:id");
        $req->bindValue(':id', $postId, PDO::PARAM_INT);
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
        $req = $bdd->prepare("DELETE FROM post WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->rowCount();
        return $reponse;
    }
}