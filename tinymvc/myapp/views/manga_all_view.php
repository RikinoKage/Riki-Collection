<div class="container">
	<section>
        <div class="row">
            <div class="col-md-12 mx-auto">
            	<h2>Collection Mangas & Novels</h2>
				<hr />
            	<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active" id="nav-possessed-tab" data-toggle="tab" href="#nav-possessed" role="tab" aria-controls="nav-possessed" aria-selected="true">Séries possédées <span class="badge badge-danger text-white"><?php echo count($mangas_all); ?></span></a>
				    <a class="nav-item nav-link" id="nav-missing-tab" data-toggle="tab" href="#nav-missing" role="tab" aria-controls="nav-missing" aria-selected="false">Séries en attente <span class="badge badge-danger text-white"><?php echo count($mangas_missing); ?></span></a>
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
				  <div class="tab-pane fade show active" id="nav-possessed" role="tabpanel" aria-labelledby="nav-possessed-tab">
				  	

				  	<hr />
					<table id="" class="manga_table table table-responsive-lg text-center table-bordered">
                    <thead class="thead-light">
                        <tr>
                        	<th width="5%">Visuel</th>
                            <th width=>Série</th>
                            <th width="15%">Editeur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mangas_all as $manga){ ?>
                        <tr class="table">
                            <td>
                            	<img id="planning_preview" class="lazy" data-src="<?=ASSETS_URL?>/site/uploads/covers/<?=sprintf('%03d',  $manga['id'] )?>/1.jpg" onerror="this.onerror=null;this.src='<?=ASSETS_URL?>/site/uploads/indisponible.jpg';">
                            </td>
                            <td>
								<h4 style="margin-bottom:-30px;"><a href="<?=URL?>series/details/<?=$manga['id']?>"><?php echo $manga['title'] ?></a></h4><br>
								<span style="font-size:11px;margin-top:15px;"><?php echo $manga['themes'] ?></span><br>
								<!-- Statut -->
								<?php if ( $manga['status'] == 'En attente') : ?>
									<span style="color:fff; background-color:#42a1b7; width:90px;" class="badge text-white"><?php echo $manga['status'] ?></span>
								<?php elseif ( $manga['status'] == 'En cours') : ?>
									<span style="color:fff; background-color:#97b742; width:90px;" class="badge text-white"><?php echo $manga['status'] ?></span>
								<?php elseif ( $manga['status'] == 'Terminé') : ?>
									<span style="color:fff; background-color:#dc4c4c; width:90px;" class="badge text-white"><?php echo $manga['status'] ?></span>
								<?php elseif ( $manga['status'] == 'Abandonné' ) : ?>
									<span style="color:fff; background-color:#DECF4E; width:90px;" class="badge text-white"><?php echo $manga['status'] ?></span>
								<?php endif; ?>
								<!-- Type -->
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
								<?php endif; ?><hr />
								<center><div class="progress" style="width:30%;">
  									<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $manga['percent_own'] ?>%" aria-valuenow="<?php echo $manga['percent_own'] ?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($manga['percent_own']) ?>%</div>
									<div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: <?php echo $manga['percent_miss'] ?>%" aria-valuenow="<?php echo $manga['percent_miss'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div></center>
							</td>
							<td>
								<center><a href="<?=URL?>series/editor/<?php echo $manga['editor'] ?>"><?php echo $manga['editor'] ?></a></center>
							</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                	</table>


				  </div>
				  <div class="tab-pane fade" id="nav-missing" role="tabpanel" aria-labelledby="nav-missing-tab">
				  	

				  	<hr />
					<table id="" class="manga_table table table-responsive-lg text-center table-bordered">
                    <thead class="thead-light">
                        <tr>
                        	<th width="5%">Visuel</th>
                            <th width=>Série</th>
                            <th width="15%">Editeur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mangas_missing as $manga){ ?>
                        <tr class="table">
                            <td>
                            	<img id="planning_preview" class="lazy" data-src="<?=ASSETS_URL?>/site/uploads/covers/<?=sprintf('%03d',  $manga['id'] )?>/1.jpg" onerror="this.onerror=null;this.src='<?=ASSETS_URL?>/site/uploads/indisponible.jpg';">
                            </td>
                            <td>
								<h4 style="margin-bottom:-30px;"><a href="<?=URL?>series/details/<?=$manga['id']?>"><?php echo $manga['title'] ?></a></h4><br>
								<span style="font-size:11px;margin-top:15px;"><?php echo $manga['themes'] ?></span><br>
								<!-- Statut -->
								<?php if ( $manga['status'] == 'En attente') : ?>
									<span style="color:fff; background-color:#42a1b7; width:90px;" class="badge text-white"><?php echo $manga['status'] ?></span>
								<?php elseif ( $manga['status'] == 'En cours') : ?>
									<span style="color:fff; background-color:#97b742; width:90px;" class="badge text-white"><?php echo $manga['status'] ?></span>
								<?php elseif ( $manga['status'] == 'Terminé') : ?>
									<span style="color:fff; background-color:#dc4c4c; width:90px;" class="badge text-white"><?php echo $manga['status'] ?></span>
								<?php elseif ( $manga['status'] == 'Abandonné' ) : ?>
									<span style="color:fff; background-color:#DECF4E; width:90px;" class="badge text-white"><?php echo $manga['status'] ?></span>
								<?php endif; ?>
								<!-- Type -->
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
							</td>
							<td>
								<center><a href="<?=URL?>series/editor/<?php echo $manga['editor'] ?>"><?php echo $manga['editor'] ?></a></center>
							</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                	</table>


				  </div>
				</div>
            </div>
        </div>
    </section>
</div>


