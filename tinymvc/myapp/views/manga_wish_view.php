<div class="container">
    <section>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>Liste d'achat</h2>
                <hr />Cette liste est une liste non exhaustive des achats que je souhaite faire ce mois-ci. Elle récupère sans discernement le nombre de tomes que je veux acheter et y ajoute le nombre de volumes souhaités sans prendre en compte les volumes déjà possédés.
				<hr />
					<table id="wished_table" class="table table-responsive-lg text-center table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th width="20%">Titre</th>
                            <th width="80%">Visuels</th>
                        </tr>
                    </thead>
					<tbody>
                        <?php foreach($mangas as $manga){ ?>
                            <tr class="table">
							<td>
								<a href="<?=URL?>series/details/<?=$manga['id']?>" class="text-danger"><?php echo $manga['title'] ?></a></br><hr />
							<?php if ( $manga['wished']['start'] == $manga['wished']['end'] ) : ?>
							<span class="badge badge-pill badge-danger">Vol. <?php echo sprintf('%02d', $manga['wished']['end']) ?></span>
							<?php else : ?>
							<span class="badge badge-pill badge-danger">Vol. <?php echo sprintf('%02d', $manga['wished']['start'])?> à <?php echo sprintf('%02d', $manga['wished']['end'])?></span>
							<?php endif; ?></td>
							<td>
							<?php
							$id = sprintf('%03d',  $manga['id']);
							$wished = $manga['wished']['start'];
							$wished_end = $manga['wished']['end'];
							$assets = ASSETS_URL;
							while ($wished <= $wished_end) {
								echo
								"<img id='wished_preview' class='lazy' data-src='$assets/site/uploads/covers/$id/$wished.jpg' onmouseover=\"overImage('$assets/site/uploads/covers/$id/$wished.jpg')\"; onmouseout=\"outImage();\" onerror=\"this.onerror=null;this.src='$assets/site/uploads/indisponible.jpg';\">";
							$wished++;
							}
							?></td>
							</center>
						</tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
