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
    <!-- DataTable -->
    <link rel="stylesheet" href="<?=ASSETS_URL?>/vendor/datatables/datatables.min.css">
    <!-- FontAwesom -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template-->
    <link href="<?=ASSETS_URL?>/admin/css/sb-admin.css" rel="stylesheet">
    <!-- Favicon -->
    <link  rel="icon" href="<?=ASSETS_URL?>/favicon.png">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="<?=URL?>admin/index"><?=NAME?> Admin</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Accueil & Statistiques">
                    <a class="nav-link" href="<?=URL?>admin/index">
                        <i class="fa fa-fw fa-home"></i>
                        <span class="nav-link-text">Accueil</span>
                    </a>
                </li>
			<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-folder"></i>
            <span class="nav-link-text">Collection</span>
          </a>
          <div class="dropdown-menu" style="position: absolute;will-change: transform;top: 0px;margin: auto 0;left: 5px;transform: translate3d(5px, 56px, 10px);right: 16px;" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Listes</h6>
            <a class="dropdown-item" href="<?=URL?>admin/series">Liste complète</a>
			<a class="dropdown-item" href="<?=URL?>admin/series_add">Ajouter une série</a>
			<a class="dropdown-item" href="<?=URL?>admin/waiting_approval">Tomes manquants</a>
            <a class="dropdown-item" href="<?=URL?>admin/wishlist">Valider les achats</a>
          </div>
        </li>
			</ul>
            <ul class="navbar-nav ml-auto">			
                <li class="nav-item">
                    <span class="navbar-text">
                        Bonjour <b><?=$_SESSION['username']?></b>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="toggleNavColor">
                        <i class="fa fa-fw fa-exchange"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Retour au site" data-toggle="modal" data-target="#logoutModal">
                        <i class="fa fa-fw fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content-wrapper">
        <?=$content?>
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright &copy; <?=NAME?> Admin 2019 &bull;</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Retour au site ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Souhaitez-vous vraiment vous déconnecter ? Vous retournerez sur la partie publique du site.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger" href="<?=URL?>admin/logout">Déconnexion</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap core JavaScript -->
        <script src="<?=ASSETS_URL?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?=ASSETS_URL?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Plugin JavaScript -->
        <script src="<?=ASSETS_URL?>/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- DataTable script -->
        <script src="<?=ASSETS_URL?>/vendor/datatables/datatables.min.js"></script>
        <script>
            $(document).ready( function () {
                $('#series_table').DataTable( {
                    stateSave: true,
                    "language": {
                        "decimal":        "",
                        "emptyTable":     "Rien à afficher",
                        "info":           "_START_ - _END_/_TOTAL_",
                        "infoEmpty":      "Le tableau est vide",
                        "infoFiltered":   "(filtered from _MAX_ total entries)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "Nombre de series à afficher : _MENU_",
                        "loadingRecords": "Chargement...",
                        "processing":     "Chargement...",
                        "search":         "Rechercher une serie :",
                        "zeroRecords":    "Aucun résultat",
                        "paginate": {
                            "first":      "Premier",
                            "last":       "Dernier",
                            "next":       "<i class=\"fa fa-chevron-right\"></i>",
                            "previous":   "<i class=\"fa fa-chevron-left\"></i>"
                        },
                    },
                    "order": [
                        [2, "asc"]
                    ],
                    "iDisplayLength": 50
                });
            } );
            $(document).ready(function() {
                $('table.display').DataTable({
                    "language": {
                        "decimal":        "",
                        "emptyTable":     "Rien à afficher",
                        "info":           "_START_ - _END_/_TOTAL_",
                        "infoEmpty":      "Le tableau est vide",
                        "infoFiltered":   "(filtered from _MAX_ total entries)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "_MENU_",
                        "loadingRecords": "Chargement...",
                        "processing":     "Chargement...",
                        "search":         "",
                        "zeroRecords":    "Aucun résultat",
                        "paginate": {
                            "first":      "Premier",
                            "last":       "Dernier",
                            "next":       "<i class=\"fa fa-chevron-right\"></i>",
                            "previous":   "<i class=\"fa fa-chevron-left\"></i>"
                        },
                    },
                    "order": [
                        [1, "desc"],
                    ],
                    "iDisplayLength": 5
                });
            } );
            $(document).ready( function () {
                $('#wishlist_table').DataTable( {
                    "language": {
                        "decimal":        "",
                        "emptyTable":     "Rien à afficher",
                        "info":           "_START_ - _END_/_TOTAL_",
                        "infoEmpty":      "Le tableau est vide",
                        "infoFiltered":   "(filtered from _MAX_ total entries)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "Nombre de billets à afficher : _MENU_",
                        "loadingRecords": "Chargement...",
                        "processing":     "Chargement...",
                        "search":         "Rechercher une serie :",
                        "zeroRecords":    "Aucun résultat",
                        "paginate": {
                            "first":      "Premier",
                            "last":       "Dernier",
                            "next":       "<i class=\"fa fa-chevron-right\"></i>",
                            "previous":   "<i class=\"fa fa-chevron-left\"></i>"
                        },
                    },
                    "order": [
                        [0, "asc"],
                    ],
                    "iDisplayLength": 75
                });
            } );
            var TOKEN_API = "<?=TOKEN_API?>";
        </script>
        <!-- Custom scripts for all pages-->
        <script src="<?=ASSETS_URL?>/admin/js/sb-admin.min.js"></script>
        <script src="<?=ASSETS_URL?>/admin/js/snapz-lib.js"></script>
        <script src="<?=ASSETS_URL?>/admin/js/snapz-lastTimestampApiUpdated.js"></script>
        <!-- Change color-->
        <script>
            $('#toggleNavColor').click(function() {
                $('nav').toggleClass('navbar-dark navbar-light');
                $('nav').toggleClass('bg-dark bg-light');
                $('body').toggleClass('bg-dark bg-light');
            });
            $(document).ready(function(){  
                window.phptimestampToDateForApiUpdate(TIMESTAMP_LAST_UPDATE_FROM_API);
            });
        </script>
    </div>
</body>

</html>