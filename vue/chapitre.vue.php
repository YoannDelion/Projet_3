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
    <link href="../vue/css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
    <!-- MENU -->
    <div class="row">
        <?php
        include_once 'includes/menu.inc.vue.php';
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
                        <a href="/Projet_3/controler/accueil.php" class="readMore">Retour à l'accueil</a>
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
                    <article class="post">
                        <h5>Titre du commentaire</h5>
                        <p class="text-right">Publié le 19/11/2018</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia
                            deserunt mollit anim id est laborum.</p>
                    </article>

                    <article class="post">
                        <h5>Titre du commentaire</h5>
                        <p class="text-right">Publié le 19/11/2018</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia
                            deserunt mollit anim id est laborum.</p>
                    </article>

                    <article class="post">
                        <h5>Titre du commentaire</h5>
                        <p class="text-right">Publié le 19/11/2018</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia
                            deserunt mollit anim id est laborum.</p>
                    </article>
                </div>

                <div class="col-sm-6">
                    <h4>Vous devez être connecté pour écrire</h4>
                    <article class="post">
                        <h5>Titre du commentaire</h5>
                        <p class="text-right">Publié le 19/11/2018</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia
                            deserunt mollit anim id est laborum.</p>
                    </article>
                </div>
            </section>

        <?php } ?>
    </div>

    <?php
    include_once 'includes/footer.inc.vue.php';
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
