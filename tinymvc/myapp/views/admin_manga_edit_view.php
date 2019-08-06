    <div class="container">
        <section>
            <div class="row">
                <div class="col-12">
                <?php if ( isset($success) && $success ) : ?>
                <div class="alert alert-success" role="alert">
                    <u><b>L'édition a été pris en compte !</b></u><br />
                </div>
                <hr />
                <?php endif; ?>

                <?php if ( isset($success) && !$success ) : ?>
                <div class="alert alert-danger" role="alert">
                    <u><b>Des champs sont manquants ou incorrects...</b></u><br />
                </div>
                <hr />
                <?php endif; ?>

                <?php if ( !isset($manga) ) { ?>
                <div class="alert alert-danger" role="alert">
                <u><b>Le manga que vous souhaitez modifié n'existe pas...</b></u><br />
                </div>
                <hr />
                <?php } else if ( isset($manga) && empty($manga) ) { ?>
                <div class="alert alert-danger" role="alert">
                <u><b>Le manga que vous souhaitez modifié n'existe pas...</b></u><br />
                </div>
                <hr />
                <?php } else { ?>
                <form method="POST">
                    <!--
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Lien Nautiljon</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="link" required value="<?php echo $manga['link'] ?>">
                        </div>
                    </div>
                    -->

                    <div class="form-group row">
                        <label  class="col-2 col-form-label">URL</label>
                        <div class="col-10">

                            <div class="input-group mb-3">
                              <input class="form-control" type="text" name="link" required value="<?php echo $manga['link'] ?>">
                              <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="completeFormForOneMangaByUrl">GET DATA</button>
                              </div>
                            </div>
                            <small id="runingCompletFormApi" class="form-text" style="display:none;color:blue;font-family:Verdana;margin:0 0 0 0;">
                                <img src="<?=ASSETS_URL?>//admin/img/Spinner-1s-50px.gif" />
                                Récupération des données via <strong>sNapzAPI</strong> en cours, veuillez patienter...
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Titre</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="title" required value="<?php echo $manga['title'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Date de sortie</label>
                        <div class="col-2">
                            <select class="form-control" name="date-day" required>
                                <option value="00" <?php if ( $manga['day'] == "00" ) : ?>selected<?php endif; ?>>00</option>
                                <option value="01" <?php if ( $manga['day'] == "01" ) : ?>selected<?php endif; ?>>01</option>
                                <option value="02" <?php if ( $manga['day'] == "02" ) : ?>selected<?php endif; ?>>02</option>
                                <option value="03" <?php if ( $manga['day'] == "03" ) : ?>selected<?php endif; ?>>03</option>
                                <option value="04" <?php if ( $manga['day'] == "04" ) : ?>selected<?php endif; ?>>04</option>
                                <option value="05" <?php if ( $manga['day'] == "05" ) : ?>selected<?php endif; ?>>05</option>
                                <option value="06" <?php if ( $manga['day'] == "06" ) : ?>selected<?php endif; ?>>06</option>
                                <option value="07" <?php if ( $manga['day'] == "07" ) : ?>selected<?php endif; ?>>07</option>
                                <option value="08" <?php if ( $manga['day'] == "08" ) : ?>selected<?php endif; ?>>08</option>
                                <option value="09" <?php if ( $manga['day'] == "09" ) : ?>selected<?php endif; ?>>09</option>
                                <option value="10" <?php if ( $manga['day'] == "10" ) : ?>selected<?php endif; ?>>10</option>
                                <option value="11" <?php if ( $manga['day'] == "11" ) : ?>selected<?php endif; ?>>11</option>
                                <option value="12" <?php if ( $manga['day'] == "12" ) : ?>selected<?php endif; ?>>12</option>
                                <option value="13" <?php if ( $manga['day'] == "13" ) : ?>selected<?php endif; ?>>13</option>
                                <option value="14" <?php if ( $manga['day'] == "14" ) : ?>selected<?php endif; ?>>14</option>
                                <option value="15" <?php if ( $manga['day'] == "15" ) : ?>selected<?php endif; ?>>15</option>
                                <option value="16" <?php if ( $manga['day'] == "16" ) : ?>selected<?php endif; ?>>16</option>
                                <option value="17" <?php if ( $manga['day'] == "17" ) : ?>selected<?php endif; ?>>17</option>
                                <option value="18" <?php if ( $manga['day'] == "18" ) : ?>selected<?php endif; ?>>18</option>
                                <option value="19" <?php if ( $manga['day'] == "19" ) : ?>selected<?php endif; ?>>19</option>
                                <option value="20" <?php if ( $manga['day'] == "20" ) : ?>selected<?php endif; ?>>20</option>
                                <option value="21" <?php if ( $manga['day'] == "21" ) : ?>selected<?php endif; ?>>21</option>
                                <option value="22" <?php if ( $manga['day'] == "22" ) : ?>selected<?php endif; ?>>22</option>
                                <option value="23" <?php if ( $manga['day'] == "23" ) : ?>selected<?php endif; ?>>23</option>
                                <option value="24" <?php if ( $manga['day'] == "24" ) : ?>selected<?php endif; ?>>24</option>
                                <option value="25" <?php if ( $manga['day'] == "25" ) : ?>selected<?php endif; ?>>25</option>
                                <option value="26" <?php if ( $manga['day'] == "26" ) : ?>selected<?php endif; ?>>26</option>
                                <option value="27" <?php if ( $manga['day'] == "27" ) : ?>selected<?php endif; ?>>27</option>
                                <option value="28" <?php if ( $manga['day'] == "28" ) : ?>selected<?php endif; ?>>28</option>
                                <option value="29" <?php if ( $manga['day'] == "29" ) : ?>selected<?php endif; ?>>29</option>
                                <option value="30" <?php if ( $manga['day'] == "30" ) : ?>selected<?php endif; ?>>30</option>
                                <option value="31" <?php if ( $manga['day'] == "31" ) : ?>selected<?php endif; ?>>31</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <select class="form-control" name="date-month" required>
                                <option value="00" <?php if ( $manga['month'] == "00" ) : ?>selected<?php endif; ?>>00</option>
                                <option value="01" <?php if ( $manga['month'] == "01" ) : ?>selected<?php endif; ?>>01 - Janvier</option>
                                <option value="02" <?php if ( $manga['month'] == "02" ) : ?>selected<?php endif; ?>>02 - Fevrier</option>
                                <option value="03" <?php if ( $manga['month'] == "03" ) : ?>selected<?php endif; ?>>03 - Mars</option>
                                <option value="04" <?php if ( $manga['month'] == "04" ) : ?>selected<?php endif; ?>>04 - Avril</option>
                                <option value="05" <?php if ( $manga['month'] == "05" ) : ?>selected<?php endif; ?>>05 - Mai</option>
                                <option value="06" <?php if ( $manga['month'] == "06" ) : ?>selected<?php endif; ?>>06 - Juin</option>
                                <option value="07" <?php if ( $manga['month'] == "07" ) : ?>selected<?php endif; ?>>07 - Juillet</option>
                                <option value="08" <?php if ( $manga['month'] == "08" ) : ?>selected<?php endif; ?>>08 - Aout</option>
                                <option value="09" <?php if ( $manga['month'] == "09" ) : ?>selected<?php endif; ?>>09 - Septembre</option>
                                <option value="10" <?php if ( $manga['month'] == "10" ) : ?>selected<?php endif; ?>>10 - Octobre</option>
                                <option value="11" <?php if ( $manga['month'] == "11" ) : ?>selected<?php endif; ?>>11 - Novembre</option>
                                <option value="12" <?php if ( $manga['month'] == "12" ) : ?>selected<?php endif; ?>>12 - Decembre</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="number" value="<?php echo $manga['year'] ?>" min="0" max="9999" name="date-year" required>
                        </div>
                        <label class="col-2 col-form-label">Statut</label>
                        <div class="col-2">
                            <select class="form-control" name="status" required>
                                <option value="0" <?php if ( $manga['status'] == "0" ) : ?>selected<?php endif; ?>>En cours...</option>
                                <option value="1" <?php if ( $manga['status'] == "1" ) : ?>selected<?php endif; ?>>En attente</option>
                                <option value="2" <?php if ( $manga['status'] == "2" ) : ?>selected<?php endif; ?>>Termin&eacute;</option>
                                <option value="3" <?php if ( $manga['status'] == "3" ) : ?>selected<?php endif; ?>>Abandonn&eacute;</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Type</label>
                        <div class="col-2">
                            <select class="form-control" name="type" required>
                                <option value="Shônen" <?php if ( strcmp($manga['type'], "Shônen" ) == 0 ) : ?>selected<?php endif; ?> >Shônen</option>
                                <option value="Seinen" <?php if ( strcmp($manga['type'], "Seinen") == 0 ) : ?>selected<?php endif; ?> >Seinen</option>
                                <option value="Hentai" <?php if ( strcmp($manga['type'], "Hentai") == 0 ) : ?>selected<?php endif; ?> >Hentai</option>
                                <option value="Josei" <?php if ( strcmp($manga['type'], "Josei") == 0 ) : ?>selected<?php endif; ?> >Josei</option>
                                <option value="Shôjo" <?php if ( strcmp($manga['type'], "Shôjo") == 0 ) : ?>selected<?php endif; ?> >Shôjo</option>
                                <option value="Kodomo" <?php if ( strcmp($manga['type'], "Kodomo") == 0 ) : ?>selected<?php endif; ?> >Kodomo</option>
                                <option value="Global-manga" <?php if ( strcmp($manga['type'], "Global-manga") == 0 ) : ?>selected<?php endif; ?> >Global-manga</option>
                                <option value="Novel" <?php if ( strcmp($manga['type'], "Novel") == 0 ) : ?>selected<?php endif; ?> >Novel</option>
                                <option value="Yuri" <?php if ( strcmp($manga['type'], "Yuri") == 0 ) : ?>selected<?php endif; ?> >Yuri</option>
                                <option value="Yaoi" <?php if ( strcmp($manga['type'], "Yaoi") == 0 ) : ?>selected<?php endif; ?> >Yaoi</option>
                                <option value="Webcomic" <?php if ( strcmp($manga['type'], "Webcomic") == 0 ) : ?>selected<?php endif; ?> >Webcomic</option>
                                <option value="Anime comics" <?php if ( strcmp($manga['type'], "Anime comics") == 0 ) : ?>selected<?php endif; ?> >Anime comics</option>
                            </select>
                        </div>
                        <label class="col-2 col-form-label">&Eacute;diteur</label>
                        <div class="col-2">
                            <input class="form-control" type="text" name="editor" value="<?php echo $manga['editor'] ?>" required>
                        </div>
                        <label class="col-2 col-form-label">Prix</label>
                        <div class="col-2">
                            <input class="form-control" type="number" value="<?php echo $manga['price'] ?>" min="0" step="0.01" name="price" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Tomes publiés</label>
                        <div class="col-2">
                            <input class="form-control" type="number" value="<?php echo $manga['published_tomes'] ?>" min="0" name="publish" required>
                        </div>
                        <label class="col-2 col-form-label">Tomes possedés</label>
                        <div class="col-2">
                            <input class="form-control" type="number" value="<?php echo $manga['owned_tomes'] ?>" min="0" name="owned" required>
                        </div>
                        <label class="col-2 col-form-label">Tomes à acheter</label>
                        <div class="col-2">
                            <input class="form-control" type="number" value="<?php echo $manga['buying_tomes'] ?>" min="0" name="buy" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Thèmes</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="themes" value="<?php echo $manga['themes'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Synopsis</label>
                        <div class="col-10">
                            <textarea class="form-control" name="synopsis" rows="10"><?php echo $manga['synopsis'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-2 col-form-label">Verification manuelle</label>
                        <div class="col-10">
                            <input class="form-control" type="checkbox" name="maj_asked" value="1" <?php if ( $manga['maj_asked'] == "1" ) : ?>checked<?php endif; ?>>
                        </div>
                    </div>
                    <br />
                    <center>
                        <input type="submit" value="Editer la série !" class="btn btn-outline-success" name="edit_manga"/>
                    <a title="supprimer le manga" data-toggle="modal" data-target="#deleteModal">
                        <button class="btn btn-outline-danger">Supprimer la série</button>
                    </a>
                </center><br>
                <?php } ?>
                </div>
            </div>
        </div>
        <!-- Delete Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Supprimer un élément</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Attention, vous allez supprimer une série. <b>Cette action est irréversible</b>. Cliquez sur "Supprimer" pour continuer.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger" href="<?=URL?>admin/series_delete/<?=$manga['id']?>">Supprimer</a>
                    </div>
                </div>
            </div>
        </section>
    </div>