<div class="container">
    <section>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>Accès rapide aux séries incomplètes</h2><hr />
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                        <center>
                            <div class="progress" style="width:92%; height:30px;margin-bottom:-23px;">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Possédés</div>
							</div>
                        </center>
                        </div>
                        <div class="col-md-4 mx-auto">
                        <center>
                            <div class="progress" style="width:92%; height:30px;margin-bottom:-23px;">
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 1000%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Achetés</div>
							</div>
                        </center>
                        </div>
                        <div class="col-md-4 mx-auto">
                        <center>
                            <div class="progress" style="width:92%; height:30px;margin-bottom:-23px;">
                                <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: 1000%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Manquants</div>
							</div>
                        </center>
                        </div>
                    </div><br><hr/>
                <table id="wishlist_table" class="table table-responsive-lg table-striped text-center table-bordered">
                    <thead>
                        <tr>
                            <th width="30%">Titre</th>
                            <th width="23%">Progression</th>
							<th width="23%">Ajouter des tomes à la Wishlist</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mangas as $manga){ ?>
                        <tr class="table">
                            <td><?php echo $manga['title'] ?></td>
							<td>
                                <center>
                                    <div class="progress" style="width:92%; height:30px;margin-bottom:-23px;">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $manga['percent_own'] ?>%" aria-valuenow="<?php echo $manga['percent_own'] ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $manga['owned'] ?></div>
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $manga['percent_buy'] ?>%" aria-valuenow="<?php echo $manga['percent_buy'] ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $manga['buying_tomes'] ?></div>
                                        <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: <?php echo $manga['percent_left'] ?>%" aria-valuenow="<?php echo $manga['percent_left'] ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $manga['left'] ?></div>
								    </div><br>
                                </center>
                            </td>
							<td>
                                <div class="btn-group dropright">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Ajouter des tomes
                                     </button>
                                     <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?=URL?>admin/series_approve/<?=$manga['id']?>/-1" target="_blank">Ajouter tout les tomes non possédés</a>
                                        <a class="dropdown-item" href="<?=URL?>admin/series_approve/<?=$manga['id']?>/5" target="_blank">Ajouter 5 tomes</a>
                                        <a class="dropdown-item" href="<?=URL?>admin/series_approve/<?=$manga['id']?>/7" target="_blank">Ajouter 7 tomes</a>
                                        <a class="dropdown-item" href="<?=URL?>admin/series_approve/<?=$manga['id']?>/10" target="_blank">Ajouter 10 tomes</a>
                                    </div>
                                </div>
                            </td>
                        </tr> 
                        <?php } ?>
                    </tbody>
                </table><br>
            </div>
        </div>
    </section>
</div>