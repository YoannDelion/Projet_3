<?php
/**
 * Projet_3
 * User: YoannD
 * Date: 21/01/2019
 * Time: 18:16
 */

class Comment extends BddConnexion
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $postId;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var boolean
     * vaut true si le commentaire a été modifié
     */
    private $updated;

    /**
     * @var DateTime|null
     */
    private $updatedAt;

    /**
     * @var boolean
     * vaut true si le commentaire a été signalé
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
     * @return int
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
     * @param Comment $comment
     * @return int
     * Ajoute un commentaire en base, retourne 0 si erreur lors de l'ajout
     */
    public function add(Comment $comment)
    {
        $req = $this->bdd->prepare('INSERT INTO comment(postId, author, comment, createdAt) VALUES(:postId, :author, :comment, NOW())');
        $req->bindValue(':postId', $comment->getPostId(), PDO::PARAM_INT);
        $req->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $req->execute();
        $retour = $req->rowCount();

        return $retour;
    }

    /**
     * @param $postId
     * @return array
     */
    public function findAllByPost($postId)
    {
        $listComments = [];

        $req = $this->bdd->prepare('SELECT id, postId, author, comment, createdAt, updated, updatedAt, reported, reportedAt FROM comment WHERE postId=:postId ORDER BY id DESC ');
        $req->bindValue('postId', $postId, PDO::PARAM_INT);
        $req->execute();
        while($datas = $req->fetch()){
            $comment = new Comment();
            $comment->setId($datas['id']);
            $comment->setPostId($postId);
            $comment->setAuthor($datas['author']);
            $comment->setComment($datas['comment']);
            $comment->setCreatedAt($datas['createdAt']);
            $comment->setUpdated($datas['updated']);
            $comment->setUpdatedAt($datas['updatedAt']);
            $comment->setReported($datas['reported']);
            $comment->setReportedAt($datas['reportedAt']);
            $listComments[] = $comment;
        }
        return $listComments;
    }

    /**
     * @return Comment[]
     */
    public function findAllReported()
    {
        $listeReports = [];

        $req = $this->bdd->query("SELECT id, postId, author, comment, createdAt, updated, updatedAt, reported, reportedAt FROM comment WHERE reported=true ORDER BY reportedAt DESC");
        while($datas = $req->fetch()){
            $report = new Comment();
            $report->setId($datas['id']);
            $report->setPostId($datas['postId']);
            $report->setAuthor($datas['author']);
            $report->setComment($datas['comment']);
            $report->setCreatedAt($datas['identifiant']);
            $report->setUpdated($datas['updated']);
            $report->setUpdatedAt($datas['updatedAt']);
            $report->setReported($datas['reported']);
            $report->setReportedAt($datas['reportedAt']);
            $listeReports[] = $report;
        }
        return $listeReports;
    }

    /**
     * @param Comment $comment
     * @return int
     * retourne 0 si erreur lors de la modification
     */
    public function update(Comment $comment)
    {
        $req = $this->bdd->prepare("UPDATE comment SET comment=:comment,  updated=true, updatedAt=NOW() WHERE id=:id");
        $req->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $req->bindValue(':id', $comment->getId(), PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->rowCount();

        return $reponse;
    }

    /**
     * @param $commentId
     * @return int
     * enregistre le signalement et sa date
     * retourne 0 si erreur lors de la modification
     */
    public function report($commentId)
    {
        $req = $this->bdd->prepare("UPDATE comment SET reported=true,  reportedAt=NOW() WHERE id=:id");
        $req->bindValue(':id', $commentId, PDO::PARAM_INT);
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
        $req = $this->bdd->prepare("DELETE FROM comment WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->rowCount();

        return $reponse;
    }
}