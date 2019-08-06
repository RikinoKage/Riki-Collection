<div class="container">
    <section>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>Liste d'achat | Vue libraire</h2>
                <hr />
					<table class="table table-responsive-lg text-center table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th width="50%">Titre</th>
                            <th width="35%">Tomes à acheter</th>
							<th></th>
                        </tr>
                    </thead>
					<tbody>
                        <?php foreach($mangas as $manga){ ?>
                            <tr class="table">
							<td><center><?php if ($manga['library_added'] == 1) : ?><?php echo $manga['title'] ?> <i class="fas fa-check text-success"></i>
							<?php else : ?>
							<?php echo $manga['title'] ?> <i class="fas fa-times text-danger"></i>
							<?php endif; ?>
							</center></td>
							<td><?php if ($manga['id'] == 438) : ?>
							<center>Vol. 63, 65, 66, 67, 68, 69, 70</center>
							<?php elseif ($manga['id'] == 150) : ?>
							<center>Vol. 9 Edition Collector</center>
							<?php elseif ($manga['wished']['start'] == $manga['wished']['end']) : ?>
							<center><?php echo $manga['wished']['end'] ?></center>
							<?php else : ?>
							<center><?php echo $manga['wished']['start']?> à <?php echo $manga['wished']['end']?></center>
							<?php endif; ?></td>
							<td>
						<button <?php if ($manga['library_added'] == 1) : ?>disabled<?php endif; ?> type="button" class="btn btn-<?php if ($manga['library_added'] == 1) : ?>muted<?php else : ?>danger<?php endif; ?> btn-sm" onclick="window.open('<?=URL?>series/library_valid/<?=$manga['id']?>', '_blank');location.reload();"><i class="fas fa-check"></i></button>
							</td>
						</tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
