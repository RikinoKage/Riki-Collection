        <div class="container-fluid">
            <!-- Content-->
            <div class="row">
                <div class="col-12">
				<h2>Gestion de la collection</h2><hr />
                    <table id="series_table" class="table table-responsive-lg table-striped text-center table-bordered">
                        <thead>
                            <tr>
								<th>ID</th>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Publiés</th>
                                <th>Possédés</th>
                                <th>Manquants</th>
                                <th>Achats</th>
                                <th>&Eacute;diteur</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($mangas as $manga){ ?>
                           <tr class="table">
								<td><?php echo $manga['id'] ?></td>
                                <?php if ( $manga['status'] == 'En attente') : ?>
								<td><a href="<?php echo $manga['link'] ?>" target="_blank" title="Nautiljon : <?php echo $manga['title'] ?>"><?php echo $manga['title'] ?></a><br> (Vol. <?php echo sprintf('%02d',  $manga['next']) ?>)</td>
								<?php elseif ( $manga['status'] == 'En cours') : ?>
								<td><a href="<?php echo $manga['link'] ?>" target="_blank" title="Nautiljon : <?php echo $manga['title'] ?>"><?php echo $manga['title'] ?></a><br> (Vol. <?php echo sprintf('%02d', $manga['next']) ?>)</td>
								<?php elseif ( $manga['status'] == 'Terminé') : ?>
								<td><a href="<?php echo $manga['link'] ?>" target="_blank" title="Nautiljon : <?php echo $manga['title'] ?>"><?php echo $manga['title'] ?></a></td>
								<?php elseif ( $manga['status'] == 'Abandonné' ) : ?>
								<td><a href="<?php echo $manga['link'] ?>" target="_blank" title="Nautiljon : <?php echo $manga['title'] ?>"><?php echo $manga['title'] ?></a></td>
								<?php endif; ?>
                                <td><?php echo $manga['date'] ?></td>
								<?php if ( $manga['status'] == 'En attente' ) : ?><td class="text-dark bg-info"><?php echo $manga['status'] ?></td> <!-- Statut en attente-->
								<?php elseif ( $manga['status'] == 'En cours' ) : ?><td class="text-dark bg-warning"><?php echo $manga['status'] ?></td><!-- Statut en cours-->
								<?php elseif ( $manga['status'] == 'Terminé' ) : ?><td class="text-dark bg-success"><?php echo $manga['status'] ?></td><!-- Statut terminé-->
								<?php elseif ( $manga['status'] == 'Abandonné' ) : ?><td class="text-dark bg-danger"><?php echo $manga['status'] ?></td><!-- Statut abandonné-->
								<?php endif; ?>
                                <td><?php echo $manga['published'] ?></td>
                                <td><?php echo $manga['owned'] ?></td>
                                <?php if ( $manga['missing'] >= 1 ) : ?><td class="text-dark bg-danger"><?php echo $manga['missing'] ?></td>
								<?php elseif ($manga['missing'] == 0 ) :?><td><?php echo $manga['missing'] ?></td>
								<?php endif; ?>
                                <td><?php echo $manga['buying'] ?> - 
                                <button type="button" class="btn btn-danger btn-sm" onclick="window.open('<?=URL?>admin/series_approve/<?=$manga['id']?>/1', '_blank');location.reload();"><i class="fa fa-plus-square"></i></button></td>
                                <td><?php echo $manga['editor'] ?></td>
                                <td><?php echo $manga['type'] ?></td>
                                <td>
									<div class="btn-group" role="group">
										<button type="button" class="btn btn-primary" onclick="window.open('<?=URL?>admin/series_edit/<?=$manga['id']?>', '_blank');"><i class="fa fa-pencil"></i></button>
										<button type="button" class="btn btn-primary" onclick="window.open('<?=URL?>manga/details/<?=$manga['id']?>', '_blank');"><i class="fa fa-external-link-square"></i></button>
									</div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br />