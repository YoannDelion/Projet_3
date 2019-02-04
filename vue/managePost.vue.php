<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="/vue/css/admin.css" rel="stylesheet">
    <link href="/vue/css/style.css" rel="stylesheet">

    <!-- TinyMCE -->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#content',
            language_url: '/vue/langues/fr_FR.js'
        });
    </script>
</head>

<body>

<!-- Menu -->
<?php
include_once __DIR__ . '/includes/adminMenu.inc.vue.php';
?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php
    include_once __DIR__ . '/includes/adminSidebar.inc.vue.php';
    ?>

    <div class="container">
        <h3>Chapitres publiés</h3>
        <?php
        if (isset($erreursForm['insertion'])) {
            echo '<div class="alert alert-danger mx-auto text-center" style="font-size: large"><b>' . $erreursForm['insertion'] . '</b></div>';
        } elseif (isset($erreursForm['success'])) {
            echo '<div class="alert alert-success mx-auto text-center" style="font-size: large"><b>' . $erreursForm['success'] . '</b></div>';
        }

        //On affiche le formulaire de modification si l'id correspond bien a un post
        if (isset($postToUpdate) && $postToUpdate->getId() != null) {
            ?>
            <form class="mt-4" action='/managePosts?action=modifier&id=<?= $postToUpdate->getId(); ?>' method="post">
                <div class="form-group ">
                    <label class="control-label " for="title">Titre du chapitre</label>
                    <input class="form-control <?php if (isset($erreursForm['title'])) {
                        echo ' erreur-form';
                    } ?>" id="title" name="title" type="text"
                           required value="<?= $postToUpdate->getTitle(); ?>"/>
                    <?php
                    if (isset($erreursForm['title'])) {
                        echo '<p class="erreur-text"> ' . $erreursForm['title'] . '</p>';
                    }
                    ?>
                </div>
                <div class="form-group ">
                    <label class="control-label" for="content">Contenu</label>
                    <textarea class="form-control <?php if (isset($erreursForm['content'])) {
                        echo ' erreur-form';
                    } ?>" id="content" name="content" required><?= $postToUpdate->getContent(); ?></textarea>
                    <?php
                    if (isset($erreursForm['content'])) {
                        echo '<p class="erreur-text"> ' . $erreursForm['content'] . '</p>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <div>
                        <button class="btn btn-primary" name="envoyer" value="envoyer" type="submit">
                            Modifier le chapitre
                        </button>
                    </div>
                </div>
            </form>

            <?php
            //sinon on affiche la liste des posts avec les boutons de modifications et suppression
        } else {
            ?>
            <div class="table-responsive  mt-4 ">
                <?php
                if (isset($success)) {
                    echo '<div class="alert alert-success" style="font-size: large"><b>' . $success . '</b></div>';
                } elseif (isset($error)) {
                    echo '<div class="alert alert-danger" style="font-size: large"><b>' . $error . '</b></div>';
                }
                ?>
                <table class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th>Chapitre</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($posts) && count($posts) > 0) {
                        foreach ($posts as $post) {
                            ?>
                            <tr>
                                <td><?= $post->getTitle(); ?></td>
                                <td><a href="/managePosts?action=modifier&id=<?= $post->getId(); ?>"><i class="fas fa-pen"></i></a></td>
                                <td><a href="/managePosts?action=supprimer&id=<?= $post->getId(); ?>"
                                       class="text-danger"
                                       onclick="return(confirm('Vous êtes sur le point de supprimer le chapitre !!\nVoulez-vous continuer ?'));"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="2"><b>Il n' y a aucun chapitre pour le moment</b></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
    <!-- /.container -->


</div>
<!-- /#wrapper -->


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