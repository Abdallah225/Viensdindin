<form method="post" action="<?php echo base_url();?>index.php?admin/movie_create" enctype="multipart/form-data">
	<div class="row">
	    <div class="col-6">
	        <div class="card">
	            <div class="card-body">
					<div class="form-group mb-3">
	                    <label for="simpleinput1">Titre du film</label>
	                    <input type="text" class="form-control" id = "simpleinput1" name="title">
	                </div>
					<div class="form-group mb-3">
	                    <label for="url">URL de la bande annonce</label>
						<span class="help">- Vimeo ou n'importe quelle vidéo hébergée</span>
	                    <input type="text" class="form-control" name="trailer_url" id="trailer_url">
	                </div>
					<div class="form-group mb-3">
	                    <label for="url">URL du Video</label>
						<span class="help">- Vimeo ou n'importe quelle vidéo hébergée</span>
	                    <input type="text" class="form-control" name="url" id="url">
	                </div>
					<div class="form-group mb-3">
	                    <label for="">Title</label>
						<span class="help">- Image pour le titre</span>
	                    <input type="file" class="form-control" name="title">
	                </div>
					
					<div class="form-group mb-3">
	                    <label for="">Thumbnail</label>
						<span class="help">- Image de l'icône du film</span>
	                    <input type="file" class="form-control" name="thumb">
	                </div>

					<div class="form-group mb-3">
	                    <label for="">Poster</label>
						<span class="help">- Image de bannière du film</span>
	                    <input type="file" class="form-control" name="poster">
	                </div>

					<div class="form-group mb-3">
						<label for="description_long">Longue description</label>
						<textarea class="form-control" id="description_long" name="description_long" rows="6"></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="description_short">Brève description</label>
						<textarea class="form-control" id="description_short" name="description_short" rows="6"></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="actors">Acteur</label>
						<span class="help">- Sélectionner les acteurs</span>
						<select class="form-control select2" id="actors" multiple name="actors[]">
							<?php
								$actors	=	$this->db->get('actor')->result_array();
								foreach ($actors as $row2):?>
							<option value="<?php echo $row2['actor_id'];?>">
								<?php echo $row2['name'];?>
							</option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="genre_id">Genre</label>
						<span class="help">- Choisir le genre</span>
						<select class="form-control select2" id="genre_id" name="genre_id">
							<?php
								$genres	=	$this->crud_model->get_genres();
								foreach ($genres as $row2):?>
							<option value="<?php echo $row2['genre_id'];?>">
								<?php echo $row2['name'];?>
							</option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="year">Année de publication</label>
						<select class="form-control select2" id="year" name="year">
							<?php for ($i = date("Y"); $i > 2000 ; $i--):?>
							<option value="<?php echo $i;?>">
								<?php echo $i;?>
							</option>
							<?php endfor;?>
						</select>
					</div>
					<div class="form-group mb-3">
	                    <label for="">Durée du film</label>
						<span class="help">- La durée que prend le film</span>
	                    <input type="time" class="form-control" name="time">
	                </div>
					<div class="form-group mb-3">
					<label for="rating">Emplacement</label>
						<span class="help">- 0 pour classement horitontal</span>
						<span class="help">- 1 pour classement vertical </span>
						<select class="form-control select2" id="rating" name="rating">
							<?php for ($i = 0; $i <= 1; $i++):?>
							<option value="<?php echo $i;?>">
								<?php echo $i;?>
							</option>
							<?php endfor;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="featured">En vedette</label>
						<span class="help">- le film en vedette sera montré dans la page d'accueil</span>
						<select class="form-control select2" id="featured" name="featured">
							<option value="0">Non</option>
							<option value="1">Oui</option>
						</select>
					</div>
	            </div>
	        </div>
	    </div>
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label class="form-label">Aperçu:</label>
					<div id="video_player_div"></div>
				</div>
			</div>
		</div>

		<hr>
		<div class="col-6">
			<div class="row">
				<div class="form-group col-6">
					<input type="submit" class="btn btn-success col-12" value="Créer le film">
				</div>
				<div class="col-6">
					<a href="<?php echo base_url();?>index.php?admin/movie_list" class="btn btn-secondary col-12">Retour</a>
				</div>
			</div>
		</div>
	</div>
</form>
