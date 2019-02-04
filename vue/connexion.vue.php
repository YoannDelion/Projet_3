<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="/vue/css/style.css" rel="stylesheet">
</head>

<body class="bg-dark">
<div class="container-fluid">
    <div class="col-md-5 mx-auto mt-5">
        <div class="card">
            <div class="card-header">Connexion</div>
            <div class="card-body">
                <form method="post" action="/connexion">
                    <?php
                    if((isset($erreur) && $erreur>0)){
                        echo '<div class="alert alert danger mx-auto text-center" style="font-weight: bold">Identifiant et/ou mot de passe incorrect</div>';
                    }
                    ?>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="identifiant" class="form-control" placeholder="Identifiant"
                                   required="required" autofocus="autofocus" name="identifiant">
                            <label for="identifiant">Identifiant</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="password" class="form-control" placeholder="Mot de passe"
                                   required="required" name="password">
                            <label for="password">Mot de passe</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" name="connexion" value="connexion">Go</button>
                </form>
            </div>
        </div>
    </div>

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
