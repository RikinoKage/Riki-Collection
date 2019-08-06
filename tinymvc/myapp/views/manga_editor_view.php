<div class="container">
	<section>
        <div class="row">
            <div class="col-md-12 mx-auto">
            <h2>Liste des titres par éditeur</h2>
				<hr />
				<div class="row">
					<div class="col-md-2 mx-auto">
						<center><h5><?=$title?></h5></center>
					</div>
					<div class="col-md-10 mx-auto">
                    <center><?php foreach($types_editor as $nb_types_editor){ ?>
                                <?php if ( $nb_types_editor['type'] == 'Global-manga') : ?>
                                    <span style="color:fff; background-color:#a19fa2; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Shônen') : ?>
									<span style="color:fff; background-color:#79bb6a; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Shôjo') : ?>
									<span style="color:fff; background-color:#dc8bc2; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Hentai') : ?>
									<span style="color:fff; background-color:#d45f3b; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Josei') : ?>
									<span style="color:fff; background-color:#986ac1; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Seinen') : ?>
									<span style="color:fff; background-color:#5c8ad2; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Kodomo') : ?>
									<span style="color:fff; background-color:#d4a63b; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Novel') : ?>
									<span style="color:fff; background-color:#000000; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Yuri') : ?>
									<span style="color:fff; background-color:#d45f3b; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Yaoi') : ?>
									<span style="color:fff; background-color:#d45f3b; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Webcomic') : ?>
									<span style="color:fff; background-color:#a19fa2; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php elseif ( $nb_types_editor['type'] == 'Anime comics') : ?>
									<span style="color:fff; background-color:#a19fa2; width:125px;" class="badge text-white align-middle"><?php echo $nb_types_editor['nbtype'] ?> <?php echo $nb_types_editor['type'] ?></span>
								<?php endif; ?>
                        
                        <?php } ?></center>
					</div>
				</div>
                <hr />
					<table class="manga_table table table-responsive-lg text-center table-bordered">
                    <thead class="thead-light">
                        <tr>
                        	<th width="5%">Visuel</th>
                            <th width=>Série</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($manga as $manga){ ?>
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
								<?php if ( $manga['owned'] == $manga['published'] ) : ?>
									<center>
										<?php echo $manga['owned'] ?> / <?php echo $manga['published'] ?> <i class="fas fa-check text-success"></i>
									<center>
								<?php elseif ( $manga['owned'] <= $manga['published']) : ?>
									<center>
										<?php echo $manga['owned'] ?> / <?php echo $manga['published'] ?> <i class="fas fa-times text-danger"></i>
									<center>
								<?php endif; ?>
							</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                	</table>
            </div>
        </div>
    </section>
</div>