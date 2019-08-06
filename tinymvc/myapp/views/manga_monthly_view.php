<div class="container">
	<section>
        <div class="row">
            <div class="col-md-12 mx-auto">
				<h2>Planning mensuel</h2>
				<hr />
				<center>
					<ul class="nav nav-fill">
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/1">Jan</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/2">Fév</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/3">Mars</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/4">Avril</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/5">Mai</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/6">Juin</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/7">Juil</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/8">Août</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/9">Sept</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/10">Oct</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/11">Nov</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="<?=URL?>series/monthly/12">Déc</a>
					  </li>
					</ul>
				</center><hr />
				<br>
					<table id="planning_table" class="table table-responsive-lg table-bordered">
                    <thead class="thead-light text-center">
                        <tr>
							<th width="5%">Visuel</th>
                            <th width="10%">Date</th>
							<th width="55%">Titre</th>
							<th width="10%">Editeur</th>
							<th width="10%">Prix</th>
							<th width="10%">Achat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mangas as $manga){ ?>
                        <tr class="table">
							<td><img id="planning_preview" class="lazy" data-src="<?=ASSETS_URL?>/site/uploads/covers/<?=sprintf('%03d',  $manga['id'] )?>/<?=$manga['next']?>.jpg" onmouseover="overImage('<?=ASSETS_URL?>/site/uploads/covers/<?=sprintf('%03d',  $manga['id'] )?>/<?=$manga['next']?>.jpg')"; onmouseout="outImage();" onerror="this.onerror=null;this.src='<?=ASSETS_URL?>/site/uploads/indisponible.jpg';"></td>
							<td><?php echo $manga['date'] ?><center></td>
                           <td><center><a href="<?=URL?>series/details/<?=$manga['id']?>"><?php echo $manga['title'] ?></a><br>
							<?php if ( $manga['next'] == 1) : ?>
								<span style="width:90px;" class="badge badge-success">Nouveauté</span>
							<?php elseif ( $manga['next'] > 1) : ?>
								<span style="width:90px;" class="badge badge-danger">Vol. <?php echo sprintf('%02d', $manga['next']) ?></span>
							<?php endif; ?>
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
										<?php endif; ?></center>
							</td>
							<td>
								<center><?php echo $manga['editor'] ?><center>
							</td>
							<td>
								<center><?php echo $manga['price'] ?>€<center>
							</td>
							<td>
								<center><a href="http://www.hayakushop.com/boutique/index.php?controller=search&search_query=<?php echo $manga['title'] ?>&submit_search=Rechercher&orderby=name&orderway=asc" target="_blank"><i class="fa fa-shopping-cart fa-1"></i></a><center>
							</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>