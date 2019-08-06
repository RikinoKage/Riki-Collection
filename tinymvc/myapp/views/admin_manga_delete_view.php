        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=URL?>admin/index">Accueil</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?=URL?>admin/series">Gestion de la collection</a>
                </li>
                <li class="breadcrumb-item active">Suppression d'un manga</li>
            </ol>
            <!-- Content-->
            <div class="row">
                <div class="col-12">
                    <?php if ( isset($success) && $success ) : ?>
                    <div class="alert alert-success" role="alert">
                    <u><b>Le manga a été supprimé avec succès !</b></u><br />
                    </div>
                    <hr />
                    <?php endif; ?>

                    <?php if ( isset($success) && !$success ) : ?>
                    <div class="alert alert-danger" role="alert">
                        <u><b>Désolé, ce manga n'existe pas...</b></u><br />
                    </div>
                    <hr />
                    <?php endif; ?>

                    <?php if ( !isset($success) ) : ?>
                    <div class="alert alert-danger" role="alert">
                        <u><b>Mince !</b></u><br />
                        Aucun ID saisis pour la suppression !
                    </div>
                    <hr />
                    <?php endif; ?>
                    <div class="text-center">
                        <a href="<?=URL?>admin/series">
                            <button type="button" class="btn btn-outline-info btn-lg">Tableau des séries</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
