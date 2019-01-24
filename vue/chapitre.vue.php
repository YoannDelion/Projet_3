<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
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
        include_once $_SERVER['DOCUMENT_ROOT'] . '/vue/includes/menu.inc.vue.php';
        ?>
    </div>

    <header class="row chapitreBanner">
    </header>

    <div class="content">

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
                        <h2><?= $post->getTitle(); ?></h2>
                        <p class="text-right">Publié le <?= $post->getCreatedAt(); ?></p>
                        <p><?= $post->getContent(); ?>
                        </p>
                    </article>
                </div>
            </section>


            <section class="row">
                <div class="col-sm-6">
                    <h4>Commentaires</h4>
                    <?php
                    if (isset($comments) && count($comments) > 0) {
                        foreach ($comments as $comment) {
                            ?>
                            <article class="post">
                                <h5><?= $comment->getAuthor(); ?></h5>
                                <p class="text-right">Publié le <?= $comment->getCreatedAt(); ?></p>
                                <p><?= $comment->getComment(); ?></p>
                            </article>

                            <?php
                        }
                    } else { ?>
                        <div class="alert alert-warning text-center">
                            <b>Aucun commentaire pour ce chapitre.</b>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="col-sm-6">
                    <h4>Publier un commentaire</h4>
                    <div class="alert alert-primary text-center">
                        <b>Vous devez être <a href="/connexion">connecté</a> pour écrire un commentaire !</b>
                    </div>
<!--                    <article class="post">-->
<!--                    </article>-->
                </div>
            </section>

        <?php } ?>
    </div>

    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/vue/includes/footer.inc.vue.php';
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
