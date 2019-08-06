<div class="container">
	<section>
        <div class="row">
            <div class="col-md-12 mx-auto">
            	<h2>Collection DVD & BR</h2>
				<hr />
            	<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active" id="nav-possessed-tab" data-toggle="tab" href="#nav-possessed" role="tab" aria-controls="nav-possessed" aria-selected="true">DVD possédées <span class="badge badge-danger text-white"><?=$series['series']?></span></a>
				    <a class="nav-item nav-link" id="nav-missing-tab" data-toggle="tab" href="#nav-missing" role="tab" aria-controls="nav-missing" aria-selected="false">DVD en attente <span class="badge badge-danger text-white"><?=$pending['series']?></span></a>
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
				  <div class="tab-pane fade show active" id="nav-possessed" role="tabpanel" aria-labelledby="nav-possessed-tab">
				  	

				  	<hr />
					<table id="manga_table" class="table table-responsive-lg text-center table-bordered">
                    <thead class="thead-light">
                        <tr>
                        	<th width="20%">Aperçu</th>
                            <th width="30%">Titre</th>
                            <th width="16%">Editeur</th>
                            <th width="16%">Prix</th>
                            <th width="17%">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dvd_all as $dvd){ ?>
                        <tr class="table">
                        	<td>
                        		<img id="allg_preview" class="float-left" src="<?=ASSETS_URL?>/site/uploads/dvd/<?=sprintf('%03d',  $dvd['id'] )?>/1.jpg" onerror="this.onerror=null;this.src='<?=ASSETS_URL?>/site/uploads/indisponible.jpg';">
                        	</td>
							<td>
								<center><?php echo $dvd['editor'] ?></center>
							</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                	</table>


				  </div>
				  <div class="tab-pane fade" id="nav-missing" role="tabpanel" aria-labelledby="nav-missing-tab">
				  	

				  	<hr />
					<table id="manga2_table" class="table table-responsive-lg text-center table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th width=>Série</th>
                            <th width="15%">Editeur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($dvd_missing as $dvd){ ?>
                        <tr class="table">
                            <td>
                            	<img id="planning_preview" class="float-left" src="<?=ASSETS_URL?>/site/uploads/<?=sprintf('%03d',  $dvd['id'] )?>/1.jpg" onerror="this.onerror=null;this.src='<?=ASSETS_URL?>/site/uploads/indisponible.jpg';">
								<h4 style="margin-bottom:-30px;"><a href="<?=URL?>$dvd/details/<?=$dvd['id']?>"><?php echo $dvd['title'] ?></a></h4><br>
								<span style="font-size:11px;margin-top:15px;"><?php echo $dvd['themes'] ?></span><br>
								<!-- Statut -->
								<?php if ( $dvd['status'] == 'En attente') : ?>
									<span style="color:fff; background-color:#42a1b7; width:90px;" class="badge text-white"><?php echo $dvd['status'] ?></span>
								<?php elseif ( $dvd['status'] == 'En cours') : ?>
									<span style="color:fff; background-color:#97b742; width:90px;" class="badge text-white"><?php echo $dvd['status'] ?></span>
								<?php elseif ( $dvd['status'] == 'Terminé') : ?>
									<span style="color:fff; background-color:#dc4c4c; width:90px;" class="badge text-white"><?php echo $dvd['status'] ?></span>
								<?php elseif ( $dvd['status'] == 'Abandonné' ) : ?>
									<span style="color:fff; background-color:#DECF4E; width:90px;" class="badge text-white"><?php echo $dvd['status'] ?></span>
								<?php endif; ?>
								<!-- Type -->
								<?php if ( $dvd['type'] == 'Global-manga') : ?>
									<span style="color:fff; background-color:#a19fa2; width:90px;" class="badge text-white">Global</span>
								<?php elseif ( $dvd['type'] == 'Shônen') : ?>
									<span style="color:fff; background-color:#79bb6a; width:90px;" class="badge text-white">Shônen</span>
								<?php elseif ( $dvd['type'] == 'Shôjo') : ?>
									<span style="color:fff; background-color:#dc8bc2; width:90px;" class="badge text-white">Shôjo</span>
								<?php elseif ( $dvd['type'] == 'Hentai') : ?>
									<span style="color:fff; background-color:#d45f3b; width:90px;" class="badge text-white">Hentai</span>
								<?php elseif ( $dvd['type'] == 'Josei') : ?>
									<span style="color:fff; background-color:#986ac1; width:90px;" class="badge text-white">Josei</span>
								<?php elseif ( $dvd['type'] == 'Seinen') : ?>
									<span style="color:fff; background-color:#5c8ad2; width:90px;" class="badge text-white">Seinen</span>
								<?php elseif ( $dvd['type'] == 'Kodomo') : ?>
									<span style="color:fff; background-color:#d4a63b; width:90px;" class="badge text-white">Kodomo</span>
								<?php elseif ( $dvd['type'] == 'Novel') : ?>
									<span style="color:fff; background-color:#000000; width:90px;" class="badge text-white">Novel</span>
								<?php elseif ( $dvd['type'] == 'Yuri') : ?>
									<span style="color:fff; background-color:#d45f3b; width:90px;" class="badge text-white">Yuri</span>
								<?php elseif ( $dvd['type'] == 'Yaoi') : ?>
									<span style="color:fff; background-color:#d45f3b; width:90px;" class="badge text-white">Yaoi</span>
								<?php elseif ( $dvd['type'] == 'Webcomic') : ?>
									<span style="color:fff; background-color:#a19fa2; width:90px;" class="badge text-white">Webcomic</span>
								<?php elseif ( $dvd['type'] == 'Anime comics') : ?>
									<span style="color:fff; background-color:#a19fa2; width:90px;" class="badge text-white">Anime comics</span>
								<?php endif; ?>
								<?php if ( $dvd['owned'] == $dvd['published'] ) : ?>
									<center>
										<?php echo $dvd['owned'] ?> / <?php echo $dvd['published'] ?>
									<center>
								<?php elseif ( $dvd['owned'] <= $dvd['published']) : ?>
									<center>
										<?php echo $dvd['owned'] ?> / <?php echo $dvd['published'] ?> <i class="fas fa-times text-danger"></i>
									<center>
								<?php endif; ?>
							</td>
							<td>
								<center><?php echo $dvd['editor'] ?></center>
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


