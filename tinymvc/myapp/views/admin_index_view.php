        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Accueil</li>
            </ol>
            <!-- Content-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-info o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="mr-5"><b><?=$total_tomes_data['total_tomes']?></b> tomes possédés</div>
                        </div>
                        <div class="card-footer text-white clearfix small z-1">
                            <span class="float-left">Montant total :</span>
                            <span class="float-right"><?=$total_tomes_data['total_price']?> €</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="mr-5"><b><?=$new_tomes_data['total_tomes']?></b> tomes à acheter</div>
                        </div>
                        <div class="card-footer text-white clearfix small z-1">
                            <span class="float-left">Montant total :</span>
                            <span class="float-right"><?=$new_tomes_data['total_price']?> €</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-times-circle-o"></i>
                            </div>
                            <div class="mr-5"><b><?=$miss_tomes_data['total_tomes']?></b> tomes manquants</div>
                        </div>
                        <div class="card-footer text-white clearfix small z-1">
                            <span class="float-left">Montant total :</span>
                            <span class="float-right"><?=$miss_tomes_data['total_price']?> €</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-secondary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="mr-5"><b><?=$waiting_tomes_data['total_tomes']?></b> tomes en attente de sortie</div>
                        </div>
                        <div class="card-footer text-white clearfix small z-1">
                            <span class="float-left">Montant total :</span>
                            <span class="float-right"><?=$waiting_tomes_data['total_price']?> €</span>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-info o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="mr-5"><b><?=$waiting_series_data['series']?></b> séries prévues</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="mr-5"><b><?=$continuing_series_data['series']?></b> séries en cours</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-check-circle-o"></i>
                            </div>
                            <div class="mr-5"><b><?=$finished_series_data['series']?></b> séries terminées</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-secondary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-times-circle-o"></i>
                            </div>
                            <div class="mr-5"><b><?=$stopped_series_data['series']?></b> séries abandonnées</div>
                        </div>
                    </div>
                </div>
            </div>
			<hr />
			<div class="row">
            <div class="col-xl-4 col-sm-3 mb-3">
            <h5><b>Nombre de séries par type</b></h5><hr />
                <table id="" class="display table table-responsive-lg text-center table-bordered">
                    <thead class="thead-light">
                        <tr>
                        	<th width=>Type</th>
                            <th width=>Nombre de séries</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php foreach($type as $nb_types){ ?>
                        <tr class="table">
                            <td>
                                <?php echo $nb_types['type'] ?>
                            </td>
                            <td>
                                <?php echo $nb_types['nbtype'] ?>
                            </td>
                        </tr>
						<?php } ?>
                    </tbody>
               </table>
				</div>
                <div class="col-xl-4 col-sm-3 mb-3">
				<h5><b>Nombre de séries par éditeurs</b></h5><hr />
                <table id="" class="display table table-responsive-lg text-center table-bordered">
                    <thead class="thead-light">
                        <tr>
                        	<th width=>Editeur</th>
                            <th width=>Nombre de séries</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php foreach($editors as $nb_edits){ ?>
                        <tr class="table">
                            <td>
                            <a href="<?=URL?>series/editor/<?php echo $nb_edits['editor'] ?>" target="_blank"><?php echo $nb_edits['editor'] ?></a>
                            </td>
                            <td>
                                <?php echo $nb_edits['nbeditor'] ?>
                            </td>
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
				</div>
                <div class="col-xl-4 col-sm-3 mb-3">
                <h5><b>Vérification manuelle</b></h5><hr />
                <table id="" class="display table table-responsive-lg text-center table-bordered">
                    <thead class="thead-light">
                        <tr>
                        	<th width="60%">Série</th>
                            <th width="30%">Date de sortie</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mangas as $manga){ ?>
                        <tr class="table">
                            <td>
                                <?php echo $manga['title'] ?>
                            </td>
                            <td>
                                <?php echo $manga['date'] ?>
                            </td>
                            <td>
                            <div class="btn-group" role="group">
								<button type="button" class="btn btn-primary btn-sm align-middle" onclick="window.open('<?=URL?>admin/series_edit/<?=$manga['id']?>', '_blank');"><i class="fa fa-pencil"></i></button>
								<button type="button" class="btn btn-primary btn-sm align-middle" onclick="window.open('<?=URL?>series/details/<?=$manga['id']?>', '_blank');"><i class="fa fa-external-link-square"></i></button>
							</div>
                            </td>
                        </tr>
						<?php } ?>
                    </tbody>
                </table>
				</div>
            </div>
        </div>