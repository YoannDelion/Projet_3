<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
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

        <form class="mt-4" action='/addPost' method="post">
            <?php
            if (isset($erreursForm['insertion'])) {
                echo '<p class="text-danger" style="font-size: large"><b>' . $erreursForm['insertion'] . '</b></p>';
            } elseif (isset($erreursForm['success'])) {
                echo '<p class="text-success" style="font-size: large"><b>' . $erreursForm['success'] . '</b></p>';
            }
            ?>
            <div class="form-group ">
                <label class="control-label " for="title">Titre du chapitre</label>
                <input class="form-control <?php if (isset($erreursForm['title'])) {
                    echo ' erreur-form';
                } ?>" id="title" name="title" type="text"
                       required <?php if (isset($_POST['title'])) {
                    echo 'value="' . $_POST['title'] . '"';
                } ?>/>
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
                } ?>" id="content" name="content"><?php if (isset($_POST['content'])) {
                        echo $_POST['content'];
                    } ?></textarea>
                <?php
                if (isset($erreursForm['content'])) {
                    echo '<p class="erreur-text"> ' . $erreursForm['content'] . '</p>';
                }
                ?>
            </div>
            <div class="form-group">
                <div>
                    <button class="btn btn-primary" name="envoyer" value="envoyer" type="submit">
                        Publier le chapitre
                    </button>
                </div>
            </div>
        </form>

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