<!DOCTYPE html>
<!-- 
 __       _                 _        __    __          _     
/ _\ __ _| |__   ___ _ __  | | ___  / / /\ \ \___  ___| |__  
\ \ / _` | '_ \ / _ \ '__| | |/ _ \ \ \/  \/ / _ \/ _ \ '_ \ 
_\ \ (_| | |_) |  __/ |    | |  __/  \  /\  /  __/  __/ |_) |
\__/\__,_|_.__/ \___|_|    |_|\___|   \/  \/ \___|\___|_.__/ 
-->
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panel Administration <?=NAME?>">
    <meta name="author" content="Dysta, Riki">
    <title><?=NAME?> Admin</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?=ASSETS_URL?>/vendor/bootstrap/css/bootstrap.min.css">
    <!-- FontAwesom -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template-->
    <link href="<?=ASSETS_URL?>/admin/css/sb-admin.css" rel="stylesheet">
    <!-- Favicon -->
    <link  rel="icon" href="<?=ASSETS_URL?>/favicon.png">
</head>

<body class="bg-dark">
    <div class="container">
	<br><br><br>
	<center><img src="<?=ASSETS_URL?>/site/img/logo.png" alt="logo" /></center><br>
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Connexion</div>
            <div class="card-body">
                <?php if ( isset($success) && !$success ) : ?>
                <div class="alert alert-danger" role="alert">
                    <u><b>Mince !</b></u><br />
                    Nom de compte et/ou mot de passe incorrecte.
                </div>
                <hr />
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label>Nom de compte</label>
                        <input class="form-control" type="text" name="account" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input class="form-control" type="password" name="password" value="" required>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" name="login">Connexion</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="<?=ASSETS_URL?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=ASSETS_URL?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="<?=ASSETS_URL?>/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>