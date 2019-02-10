<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Articles</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="/vue/css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
    <!-- MENU -->
    <div class="row">
        <?php
        include_once __DIR__ . '/includes/menu.inc.vue.php';
        ?>
    </div>

    <header class="row chapitreBanner">
    </header>


        <?php
        if ($erreur !== null) { ?>
            <section class="row">
                <div class="col-12 alert alert-danger text-center ">
                    <b><?= $erreur; ?></b>
                </div>
                <div class="col-12">
                    <div class="text-center">
                        <a href="/accueil" class="readMore">Retour à l'accueil</a>
                    </div>
                </div>
            </section>
            <?php
        } else {
            ?>
            <section class="row">
                <div class="col-12 ">
                    <article class="post ">
                        <h2><?= htmlspecialchars($post->getTitle()); ?></h2>
                        <p class="text-right">Publié le <?= date("d-m-Y à H:i", strtotime($post->getCreatedAt())); ?></p>
                        <p><?= $post->getContent(); ?>
                        </p>
                    </article>
                </div>
            </section>


            <section class="row">
                <div class="col-sm-6">
                    <h4>Commentaires</h4>
                    <?php

                    if (isset($erreurReport)) {
                        echo '<div class="alert alert-danger text-center mx-auto" style="font-size: large"><b>' . $erreurReport . '</b></div>';
                    } elseif (isset($successReport)) {
                        echo '<div class="alert alert-success text-center mx-auto" style="font-size: large"><b>' . $successReport . '</b></div>';
                    }

                    if (isset($comments) && count($comments) > 0) {
                        foreach ($comments as $comment) {
                            ?>
                            <article class="post">
                                <h5><?= htmlspecialchars($comment->getAuthor()); ?></h5>
                                <p class="text-right">Publié le <?= date("d-m-Y à H:i", strtotime($comment->getCreatedAt())); ?></p>
                                <p>
                                    <?php
                                    if ($comment->isReported() == true) {
                                        echo '<i>Ce commentaire a été signalé, nous sommes en train de l\'analyser.</i>';
                                    } else {
                                    echo htmlspecialchars($comment->getComment());
                                    ?>
                                </p>
                                <form action='/chapitre?id=<?= $post->getId(); ?>' method="post">
                                    <input type="hidden" name="reportedComment" value="<?= $comment->getId(); ?>">
                                    <button type="submit" class="btn btn-light text-secondary font-weight-light btn-sm"
                                            name="report" value="report">
                                        <i>Signaler ce commentaire</i>
                                    </button>
                                </form>
                                <?php } ?>
                            </article>

                            <?php
                        }
                    } else { ?>
                        <div class="alert alert-warning text-center mx-auto">
                            <b>Aucun commentaire pour ce chapitre.</b>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="col-sm-6">
                    <h4>Publier un commentaire</h4>
                    <article class="post">
                        <form action='/chapitre?id=<?= $post->getId(); ?>' method="post">
                            <?php
                            if (isset($erreursForm['insertion'])) {
                                echo '<div class="alert alert-danger mx-auto text-center" style="font-size: large"><b>' . $erreursForm['insertion'] . '</b></div>';
                            } elseif (isset($erreursForm['success'])) {
                                echo '<div class="alert alert-success mx-auto text-center" style="font-size: large"><b>' . $erreursForm['success'] . '</b></div>';
                            }
                            ?>
                            <div class="form-group ">
                                <label class="control-label " for="author">Votre nom</label>
                                <input class="form-control <?php if (isset($erreursForm['author'])) {
                                    echo ' erreur-form';
                                } ?>" id="author" name="author" type="text"
                                       required <?php if (isset($_POST['author'])) {
                                    echo 'value="' . htmlspecialchars($_POST['author']) . '"';
                                } ?>/>
                                <?php
                                if (isset($erreursForm['author'])) {
                                    echo '<p class="erreur-text"> ' . $erreursForm['author'] . '</p>';
                                }
                                ?>
                            </div>
                            <div class="form-group ">
                                <label class="control-label" for="comment">Commentaire</label>
                                <textarea class="form-control <?php if (isset($erreursForm['comment'])) {
                                    echo ' erreur-form';
                                } ?>" id="comment" name="comment" required><?php if (isset($_POST['comment'])) {
                                        echo htmlspecialchars($_POST['comment']);
                                    } ?></textarea>
                                <?php
                                if (isset($erreursForm['comment'])) {
                                    echo '<p class="erreur-text"> ' . $erreursForm['comment'] . '</p>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button class="submitBtn" name="envoyer" value="envoyer" type="submit">
                                        Envoyer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </article>
                </div>
            </section>

        <?php } ?>

    <?php
    include_once __DIR__ . '/includes/footer.inc.vue.php';
    ?>

</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>

</html>
