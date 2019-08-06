<section class="bg-light">
	<div class="container">
	<center><h3>Ma collection</h3></center><hr />
		<div class="row">
				<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active" id="nav-random-tab" data-toggle="tab" href="#nav-random" role="tab" aria-controls="nav-random" aria-selected="true">Au hasard</a>
				    <a class="nav-item nav-link" id="nav-news-tab" data-toggle="tab" href="#nav-news" role="tab" aria-controls="nav-news" aria-selected="false">Mes sorties</a>
				    <a class="nav-item nav-link" id="nav-adds-tab" data-toggle="tab" href="#nav-adds" role="tab" aria-controls="nav-adds" aria-selected="false">Mes ajouts</a>
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<!-- Random manga in DB -->
					<div class="tab-pane fade show active" id="nav-random" role="tabpanel" aria-labelledby="nav-random-list"><hr />
					<div class="row">
				
		<div class="col-md-12 mx-auto">
			<table class="table table-responsive-lg text-center table-bordered w-100">
				<tbody>
					<tr class="table">
						<td rowspan="4">
							<center>
					<figure>
						<img id="preview_home" style="margin-top:15px;" class="lazy" data-src="<?=ASSETS_URL?>/site/uploads/covers/<?=sprintf('%03d',  $manga['id'])?>/1.jpg" onerror="this.onerror=null;this.src='<?=ASSETS_URL?>/site/uploads/indisponible.jpg';"><center>
							<figcaption>
								<h5><a href="<?=URL?>series/details/<?=$manga['id']?>"><?php echo $manga['title'] ?></a></h5>
							</figcaption>
					</figure>

						</td>
						<td>
							<b>Thèmes</b>
						</td>
						<td colspan="6">
							<?php echo $manga['themes'] ?>
						</td>
					</tr>
					<tr class="table">
						<td width="17%">
							<b>Statut</b>
						</td>
						<td width="29%" 
							<?php if ( $manga['status'] == 'En attente') : ?>
							style="color:fff; background-color:#42a1b7" class="text-white"
							<?php elseif ( $manga['status'] == 'En cours') : ?>
							style="color:fff; background-color:#97b742" class="text-white"
							<?php elseif ( $manga['status'] == 'Terminé') : ?>
							style="color:fff; background-color:#dc4c4c" class="text-white"
							<?php elseif ( $manga['status'] == 'Abandonné') : ?>
							style="color:fff; background-color:#DECF4E" class="text-white"
							<?php endif; ?>>
							<?php echo $manga['status_let'] ?>
						</td>
						<td width="18%">
							<b>Tomes publiés</b>
						</td>
						<td width="9%">
							<?php echo $manga['published_tomes'] ?>
						</td>
						<td width="18%">
							<b>Tomes possédés</b>
						</td>
						<td width="9%">
							<?php echo $manga['owned_tomes'] ?>
						</td>
					</tr>
					<tr class="table">
						<td>
							<b>Editeur</b>
						</td>
						<td>
							<?php echo $manga['editor'] ?>
						</td>
						<td>
							<b>Type</b>
						</td>
						<td <?php if ( $manga['type'] == 'Global-manga') : ?>
									style="color:fff; background-color:#a19fa2;" class="text-white"
								<?php elseif ( $manga['type'] == 'Shônen') : ?>
									style="color:fff; background-color:#79bb6a;" class="text-white"
								<?php elseif ( $manga['type'] == 'Shôjo') : ?>
									style="color:fff; background-color:#dc8bc2;" class="text-white"
								<?php elseif ( $manga['type'] == 'Hentai') : ?>
									style="color:fff; background-color:#d45f3b;" class="text-white"
								<?php elseif ( $manga['type'] == 'Josei') : ?>
									style="color:fff; background-color:#986ac1;" class="text-white"
								<?php elseif ( $manga['type'] == 'Seinen') : ?>
									style="color:fff; background-color:#5c8ad2;" class="text-white"
								<?php elseif ( $manga['type'] == 'Kodomo') : ?>
									style="color:fff; background-color:#d4a63b;" class="text-white"
								<?php elseif ( $manga['type'] == 'Novel') : ?>
									style="color:fff; background-color:#000000;" class="text-white"
								<?php elseif ( $manga['type'] == 'Yuri') : ?>
									style="color:fff; background-color:#d45f3b;" class="text-white"
								<?php elseif ( $manga['type'] == 'Yaoi') : ?>
									style="color:fff; background-color:#d45f3b;" class="text-white"
								<?php elseif ( $manga['type'] == 'Webcomic') : ?>
									style="color:fff; background-color:#a19fa2;" class="text-white"
								<?php elseif ( $manga['type'] == 'Anime comics') : ?>
									 style="color:fff; background-color:#a19fa2;" class="text-white"
								<?php endif; ?>>
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
							<div id="syno_scroll" class="bg-muted align-middle">
								<?php echo $manga['synopsis'] ?>
							</div>
						</td>
						<td>
						<center>
						<a href="http://www.hayakushop.com/boutique/index.php?controller=search&search_query=<?php echo $manga['title'] ?>&submit_search=Rechercher&orderby=name&orderway=asc" target="_blank"><img src="<?=ASSETS_URL?>/site/hayakushop.jpg"></a><br><hr />
						<a href="https://www.fnac.com/SearchResult/ResultList.aspx?SCat=0%211&Search=<?php echo $manga['title'] ?>&sft=1&sa=0" target="_blank"><img src="<?=ASSETS_URL?>/site/fnac.jpg"></a><br><hr />
						<a href="https://www.amazon.fr/s?k=<?php echo $manga['title'] ?>&i=stripbooks&__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&ref=nb_sb_noss_2" target="_blank"><img src="<?=ASSETS_URL?>/site/amazon.jpg"></a><br>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
				  </div>
				  <!-- 12 next new tomes -->
				  <div class="tab-pane fade" id="nav-news" role="tabpanel" aria-labelledby="nav-news-list"><hr />
				  <center>
					<?php foreach( $manga_next as $manga){ ?>
					<figure style="
						display:inline-block;
						font-size: 12px;">
					<a href="<?=URL?>series/details/<?php echo $manga['id'] ?>" title="<?php echo $manga['title']?> - <?php echo $manga['date']?>"><img id="home_preview" class="lazy" data-src="<?=ASSETS_URL?>//site/uploads/covers/<?=sprintf('%03d',  $manga['id'])?>/<?php echo $manga['next'] ?>.jpg" onerror="this.onerror=null;this.src='<?=ASSETS_URL?>/site/uploads/indisponible.jpg';"></a>
					<figcaption style="margin-top:-8px;">
					<?php if ( $manga['published_tomes'] + 1 == 1) : ?>
						<span style="width:90px;" class="badge badge-success">Nouveauté</span>
					<?php elseif ( $manga['published_tomes'] + 1 > 1) : ?>
						<span style="width:90px;" class="badge badge-primary">Suite - Vol. <?php echo sprintf('%02d', $manga['next']) ?></span>
					<?php endif; ?>
					</figcaption>
					</figure>
					<?php } ?></center>
				  </div>
				  <!-- 30 new added manga in DB -->
				  <div class="tab-pane fade" id="nav-adds" role="tabpanel" aria-labelledby="nav-adds-list"><hr />
				  <center><?php foreach($manga_lasts as $manga){ ?>
					<figure style="display:inline-block;font-size: 12px;">
					<a href="<?=URL?>series/details/<?php echo $manga['id'] ?>" title="<?php echo $manga['title']?>"><img id="home_preview" class="lazy" data-src="<?=ASSETS_URL?>//site/uploads/covers/<?=sprintf('%03d',  $manga['id'])?>/1.jpg" onerror="this.onerror=null;this.src='<?=ASSETS_URL?>/site/uploads/indisponible.jpg';"></a>
						<figcaption style="margin-top:-8px;">
							<?php if ( $manga['type'] == 'Global-manga') : ?>
									<span style="color:fff; background-color:#a19fa2; width:90px;" class="badge text-white">Global</span>
								<?php elseif ( $manga['type'] == 'Shônen') : ?>
									<span style="color:fff; background-color:#79bb6a; width:90px;" class="badge text-white">Shônen</span>
								<?php elseif ( $manga['type'] == 'Shôjo') : ?>
									<span style="color:fff; background-color:#dc8bc2; width:90px;" class="badge text-white">Shôjo</span>
								<?php elseif ( $manga['type'] == 'Hentai') : ?>
									<span style="color:fff; background-color:#d45f3b; width:90px;" class="badge text-white">Hentai</span>
								<?php elseif ( $manga['type'] == 'Josei') : ?>
									<span style="color:fff; background-color:#986ac1; width:90px;" class="badge text-white">Josei</span>
								<?php elseif ( $manga['type'] == 'Seinen') : ?>
									<span style="color:fff; background-color:#5c8ad2; width:90px;" class="badge text-white">Seinen</span>
								<?php elseif ( $manga['type'] == 'Kodomo') : ?>
									<span style="color:fff; background-color:#d4a63b; width:90px;" class="badge text-white">Kodomo</span>
								<?php elseif ( $manga['type'] == 'Novel') : ?>
									<span style="color:fff; background-color:#000000; width:90px;" class="badge text-white">Novel</span>
								<?php elseif ( $manga['type'] == 'Yuri') : ?>
									<span style="color:fff; background-color:#d45f3b; width:90px;" class="badge text-white">Yuri</span>
								<?php elseif ( $manga['type'] == 'Yaoi') : ?>
									<span style="color:fff; background-color:#d45f3b; width:90px;" class="badge text-white">Yaoi</span>
								<?php elseif ( $manga['type'] == 'Webcomic') : ?>
									<span style="color:fff; background-color:#a19fa2; width:90px;" class="badge text-white">Webcomic</span>
								<?php elseif ( $manga['type'] == 'Anime comics') : ?>
									<span style="color:fff; background-color:#a19fa2; width:90px;" class="badge text-white">Anime comics</span>
								<?php endif; ?>
						</figcaption>
					</figure>
					<?php } ?></center>
				  
				  
				  </div>
				</div>
			  </div>
</div>
</section>

