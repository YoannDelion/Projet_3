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
    <link href="css/admin.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.html">Administration</a>

    <ul class="push-right navbar-nav ml-auto">
        <li class="nav-item ">
            <a class="nav-link " href="accueil.vue.php">
                <i class="fas fa-home"></i>
                <span>Retour à l'accueil</span>
            </a>
        </li>
    </ul>
</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-plus-circle"></i>
                <span>Ajouter un article</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-pen"></i>
                <span>Modifier un article</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-trash"></i>
                <span>Supprimer un article</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-comment"></i>
                <span>Gérer les commentaires</span></a>
        </li>
    </ul>


    <div class="container-fluid">

        <p>ok</p>

    </div>
    <!-- /.container-fluid -->


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
