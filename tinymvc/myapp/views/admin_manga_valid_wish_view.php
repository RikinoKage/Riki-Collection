<div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>Liste des tomes à acheter</h2>
                <table id="wishlist_table" class="table table-responsive-lg table-striped text-center table-bordered">
                    <thead>
                        <tr>
                            <th width="55%">Titre</th>
                            <th width="40%">Tomes à acheter</th>
							<th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mangas as $manga){ ?>
                        <tr class="table">
                            <td>
								<a href="<?=URL?>manga/details/<?=$manga['id']?>"><?php echo $manga['title'] ?></a>
							</td>
							<td><?php if ( $manga['wished']['start'] == $manga['wished']['end'] ) : ?>
                            <span class="badge badge-pill badge-primary">Vol. <?php echo sprintf('%02d', $manga['wished']['end']) ?></span>
                            <?php else : ?>
                            <span class="badge badge-pill badge-primary">Vol. <?php echo sprintf('%02d', $manga['wished']['start'])?> à <?php echo sprintf('%02d', $manga['wished']['end'])?></span>
                            <?php endif; ?></td>
							<td>
                            <button type="button" class="btn btn-sm btn-primary text-center" onclick="window.open('<?=URL?>admin/series_valid/<?=$manga['id']?>', '_blank');location.reload();">Valider l'achat</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
