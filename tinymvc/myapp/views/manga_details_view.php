<div class="container">
	<section>
        <div class="row">
            <div class="col-md-12 mx-auto">
				<h2><?php echo $manga['title'] ?>
					</h2><hr />
			</div>
		</div>
		<div class="row">
				<div class="col-md-12 mx-auto">
			<table class="table table-responsive-lg text-center table-bordered">
				<tbody>
					<tr class="table">
						<td rowspan="4">
							<center><img id="preview_home" style="margin-top:15px;"  class="lazy" data-src="<?=ASSETS_URL?>/site/uploads/covers/<?=sprintf('%03d',  $manga['id'])?>/1.jpg" onerror="this.onerror=null;this.src='<?=ASSETS_URL?>/site/uploads/indisponible.jpg';"></center>
						</td>
						<td>
							<b>Thèmes</b>
						</td>
						<td colspan="6">
							<?php echo $manga['themes'] ?>
						</td>
					</tr>
					<tr class="table">
						<td>
							<b>Statut</b>
						</td>
						<td <?php if ( $manga['status'] == 1) : ?>
												class="table-success"
											<?php elseif ( $manga['status'] == 0) : ?>
												class="table-primary"
											<?php elseif ( $manga['status'] == 2) : ?>
												class="table-danger"
											<?php elseif ( $manga['status'] == 3) : ?>
												class="table-warning"
										<?php endif; ?>>
							<?php echo $manga['status_let'] ?>
						</td>
						<td>
							<b>Tomes publiés</b>
						</td>
						<td>
							<?php echo $manga['published_tomes'] ?>
						</td>
						<td>
							<b>Tomes possédés</b>
						</td>
						<td class="table-success">
							<?php echo $manga['owned_tomes'] ?>
						</td>
					</tr>
					<tr class="table">
						<td>
							<b>Editeur</b>
						</td>
						<td>
							<a href="<?=URL?>series/editor/<?php echo $manga['editor'] ?>"><?php echo $manga['editor'] ?></a>
						</td>
						<td>
							<b>Type</b>
						</td>
						<td>
							<?php echo $manga['type'] ?>
						</td>
						<td>
							<b>Prix</b>
						</td>
						<td>
							<?php echo $manga['price'] ?>€
						</td>
					</tr>
					<tr class="table">
						<td colspan="5">
							<div id="syno_scroll" class="bg-muted">
								<?php echo $manga['synopsis'] ?>
							</div>
						</td>
						<td>
							
						<a href="http://www.hayakushop.com/boutique/index.php?controller=search&search_query=<?php echo $manga['title'] ?>&submit_search=Rechercher&orderby=name&orderway=asc" target="_blank"><img src="<?=ASSETS_URL?>/site/hayakushop.jpg"></a><br><hr />
						<a href="https://www.fnac.com/SearchResult/ResultList.aspx?SCat=0%211&Search=<?php echo $manga['title'] ?>&sft=1&sa=0" target="_blank"><img src="<?=ASSETS_URL?>/site/fnac.jpg"></a><br><hr />
						<a href="https://www.amazon.fr/s?k=<?php echo $manga['title'] ?>&i=stripbooks&__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&ref=nb_sb_noss_2" target="_blank"><img src="<?=ASSETS_URL?>/site/amazon.jpg"></a><br>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mx-auto">
			<h4>Tomes publiés</h4><hr />
			<center><?php
			$id = sprintf('%03d',  $manga['id']);
			$visuel = 1;
			$assets = ASSETS_URL;
			while ($visuel <= $manga['published_tomes']) {
				echo "<img id='home_preview' class='lazy' data-src='$assets/site/uploads/covers/$id/$visuel.jpg' onmouseover=\"overImage('$assets/site/uploads/covers/$id/$visuel.jpg')\"; onmouseout=\"outImage();\" onerror=\"this.onerror=null;this.src='$assets/site/uploads/indisponible.jpg';\">";
				$visuel++;
			}
			?></center>
		</div>
	</div>
    </section>
</div>