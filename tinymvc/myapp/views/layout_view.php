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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Interface de gestion de collection de mangas">
        <meta name="author" content="Zaxner, Riki">
        <title><?=$title?> - <?=NAME?></title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?=ASSETS_URL?>/vendor/bootstrap/css/bootstrap.min.css">
        <!-- DataTable -->
        <link rel="stylesheet" href="<?=ASSETS_URL?>/vendor/datatables/datatables.min.css">
        <!-- FontAwesom -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="<?=ASSETS_URL?>/site/css/custom.css">
        <!-- Favicon -->
        <link  rel="icon" href="<?=ASSETS_URL?>/favicon.png">
		<script src="<?=ASSETS_URL?>/site/js/bigpicture.js" type="text/javascript"></script>
        <!-- LazyLoad -->
        <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.0.0/dist/lazyload.min.js"></script>

    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="<?=URL?>home"><img src="<?=ASSETS_URL?>/site/img/logo.png" alt="logo" class="img-fluid" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse vertical-align" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger text-light" href="<?=URL?>home">Accueil</a>
                        </li>
                        <li class="nav-item">
							<div class="dropdown">
								<a href="#" class="nav-link js-scroll-trigger dropdown-toggle text-light" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
								Collection
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="<?=URL?>series/all">Mangas & Novels</a>
							</div>
						<li class="nav-item">
						<li class="nav-item">
							<div class="dropdown">
								<a href="#" class="nav-link js-scroll-trigger dropdown-toggle text-light" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
								Planning
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="<?=URL?>series/planning">Complet</a>
									<a class="dropdown-item" href="<?=URL?>series/monthly/<?php echo date("n"); ?>">Mensuel</a>
							</div>
						<li class="nav-item">
						<div class="dropdown">
								<a href="#" class="nav-link js-scroll-trigger dropdown-toggle text-light" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
								Utilitaire
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="<?=URL?>home/wishlist">Liste d'achat</a>
									<div class="dropdown-divider"></div>
									<h6 class="dropdown-header">Administration</h6>
									<a class="dropdown-item" href="<?=URL?>admin/login" target="_blank">Connexion</a>
							</div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
		<br><br>
        <?=$content?>

        <!-- Bootstrap core JavaScript -->
        <script src="<?=ASSETS_URL?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?=ASSETS_URL?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Plugin JavaScript -->
        <script src="<?=ASSETS_URL?>/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- CkEditor script -->
        <script src="<?=ASSETS_URL?>/vendor/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'ckeditor' );
        </script>
        <!-- DataTable script -->
        <script src="<?=ASSETS_URL?>/vendor/datatables/datatables.min.js"></script>
        <script>
            $(document).ready( function () {
                $('table.manga_table').DataTable( {
						"language": {
							"decimal":        "",
							"emptyTable":     "Rien à afficher",
							"info":           "",
							"infoEmpty":      "Le tableau est vide",
							"infoFiltered":   "(filtered from _MAX_ total entries)",
							"infoPostFix":    "",
							"thousands":      ",",
							"lengthMenu":     "Affichage _MENU_",
							"loadingRecords": "Chargement...",
							"processing":     "Chargement...",
							"search":         "Recherche",
							"zeroRecords":    "Aucun résultat",
							"paginate": {
								"first":      "Premier",
								"last":       "Dernier",
								"next":       "<i class=\"fa fa-chevron-right\"></i>",
								"previous":   "<i class=\"fa fa-chevron-left\"></i>"
							},
						},
						"iDisplayLength": 20,
                        "autoWidth" : false
                });
            } );
			$(document).ready( function () {
                $('#wished_table').DataTable( {
                    "language": {
                        "decimal":        "",
                        "emptyTable":     "Rien à afficher",
                        "info":           "",
                        "infoEmpty":      "Le tableau est vide",
                        "infoFiltered":   "(filtered from _MAX_ total entries)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "Affichage _MENU_",
                        "loadingRecords": "Chargement...",
                        "processing":     "Chargement...",
                        "search":         "Recherche",
                        "zeroRecords":    "Aucun résultat",
                        "paginate": {
                            "first":      "Premier",
                            "last":       "Dernier",
                            "next":       "<i class=\"fa fa-chevron-right text-danger\"></i>",
                            "previous":   "<i class=\"fa fa-chevron-left text-danger\"></i>"
                        },
                    },
                    "iDisplayLength": 100
                });
            } );
			$(document).ready( function () {
                $('#planning_table').DataTable( {
                    "language": {
                        "decimal":        "",
                        "emptyTable":     "Rien à afficher",
                        "info":           "",
                        "infoEmpty":      "Le tableau est vide",
                        "infoFiltered":   "(filtered from _MAX_ total entries)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "Affichage _MENU_",
                        "loadingRecords": "Chargement...",
                        "processing":     "Chargement...",
                        "search":         "Recherche",
                        "zeroRecords":    "Aucun résultat",
                        "paginate": {
                            "first":      "Premier",
                            "last":       "Dernier",
                            "next":       "<i class=\"fa fa-chevron-right text-danger\"></i>",
                            "previous":   "<i class=\"fa fa-chevron-left text-danger\"></i>"
                        },
                    },
                    "iDisplayLength": 25
                });
            } );
        </script>
        <script type="text/javascript">
            var lazyLoadInstance = new LazyLoad({
                elements_selector: ".lazy"
                // ... more custom settings?
            });
        </script>
    </body>
</html>