<?php
include_once __DIR__ . '/includes/headerHTML.inc.vue.php';
?>

<body class="bg-dark">
<div class="container-fluid">
    <div class="col-md-5 mx-auto mt-5">
        <div class="card">
            <div class="card-header">Connexion</div>
            <div class="card-body">
                <form method="post" action="/connexion">
                    <?php if ((isset($erreur) && $erreur > 0)) : ?>
                        <div class="alert alert danger mx-auto text-center" style="font-weight: bold">Identifiant et/ou
                            mot de passe incorrect
                        </div>
                    <?php endif; ?>
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
