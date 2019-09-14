<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-6">
		<a href="<?php echo base_url();?>index.php?admin/series_edit/<?php echo $series_id;?>"
			class="btn btn-primary" style="clear:both;margin-bottom: 20px;" >
			<i class="mdi mdi-arrow-left-drop-circle-outline"></i>
			Retour aux séries
		</a>
		<a href="<?php echo base_url();?>index.php?page/playseries/<?php echo $series_id.'/'.$season_id;?>"
			class="btn btn-primary" style="clear:both;margin-bottom: 20px;" target="_blank">
			<i class="mdi mdi-arrow-top-right"></i>
			Visiter <?php echo $season_name;?>
		</a>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6">
		<a href="#" onClick="load_create_form()"
			class="btn btn-primary pull-right" style="clear:both;margin-bottom: 20px;">
		<i class="fa fa-plus"></i>
		Créer un épisode
		</a>
	</div>
</div>
<div class="row">
	<!-- BASIC INFORMATION UPDATE -->
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="grid simple ">
			<div class="grid-title">
				<h4>Liste des épisodes</h4>
			</div>
			<div class="grid-body">
				<?php
					$episodes	=	$this->crud_model->get_episodes_of_season($season_id);
					?>
				<table class="table table-hover no-more-tables">
					<thead>
						<tr>
							<th>#</th>
							<th></th>
							<th>Durée</th>
							<th>Titre</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							// $counter	=	1;
							foreach ($episodes as $row):
							$episode_id	=	$row['episode_id'];
							?>
						<tr>
							<td>
								<?php echo $row['name_episode'] ?>
							</td>
	
							<td><img src="<?php echo $this->crud_model->get_thumb_url('episode' , $row['episode_id']);?>" style="height: 60px;" /></td>
							<td>
								<?php echo $row['time']?>
							</td>
							<td>
								<?php echo $row['title_episode'];?>
							</td>
							<td>
								<a href="#" onClick="load_edit_form(<?php echo $series_id.','.$season_id.','.$episode_id;?>)"
									class="btn btn-info btn-xs btn-mini">
								Editer</a>
								<a href="<?php echo base_url();?>index.php?admin/episode_delete/<?php echo $series_id.'/'.$season_id.'/'.$episode_id;?>" 
									class="btn btn-danger btn-xs btn-mini" onclick="return confirm('voulez_vous supprimer cet episode?')">
								Supprimer</a>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
	<script>
		function load_edit_form(series_id,season_id,episode_id)
		{
			document.getElementById("form_holder").innerHTML = document.getElementById("edit_episode_form_"+episode_id).innerHTML;
		}
		
		// CHARGER LE FORMULAIRE D'ÉPISODE CRÉER AU PREMIER
		window.onload = function ()
		{
			load_create_form()
		}
		
		function load_create_form()
		{
			document.getElementById("form_holder").innerHTML = document.getElementById("create_episode_form").innerHTML;
		}
	</script>
	<!-- GÉRER LES SAISONS ET LES ÉPISODES -->
	<div class="col-md-6 col-sm-12 col-xs-12" id="form_holder">
	</div>
</div>
<!--FORMULAIRE DE CREATION D'EPISODE-->
<div id="create_episode_form" style="display: none;">
	<div class="grid simple ">
		<div class="grid-title">
			<h4>Créer un nouvel épisode</h4>
		</div>
		<div class="grid-body">
			<form method="post" action="<?php echo base_url();?>index.php?admin/episode_create/<?php echo $series_id.'/'.$season_id;?>"
				enctype="multipart/form-data">
				<div class="form-group">
					<label class="form-label">Titre</label>
					<span class="help"></span>
					<div class="controls">
						<input type="text" class="form-control" name="title_episode" value="">
					</div>
				</div>
				<div class="form-group mb-3">
	                    <label for="">Durée de l'episode</label>
						<span class="help">- Temps mis de l'episode</span>
	                    <input type="time" class="form-control" name="time">
	                </div>
				<div class="form-group">
					<label class="form-label">Video Url</label>
					<span class="help">- Vimeo ou n'importe quelle vidéo hébergée</span>
					<div class="controls">
						<input type="text" class="form-control" name="url" id="url">
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Thumbnail</label>
					<span class="help">- Image de l'icône du film</span>
					<div class="controls">
						<input type="file" class="form-control" name="thumb">
					</div>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Créer episode">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- FORMULAIRE DE MODIFICATION D'EPISODE-->
<?php
	foreach ($episodes as $row):
	$episode_id	=	$row['episode_id'];
	?>
<div id="edit_episode_form_<?php echo $row['episode_id'];?>" style="display: none;">
	<div class="grid simple ">
		<div class="grid-title">
			<h4>Editer episode</h4>
		</div>
		<div class="grid-body">
			<form method="post" action="<?php echo base_url();?>index.php?admin/episode_edit/<?php echo $series_id.'/'.$season_id.'/'.$episode_id;?>"
				enctype="multipart/form-data">
				<div class="form-group">
					<label class="form-label">Titre</label>
					<span class="help"></span>
					<div class="controls">
						<input type="text" class="form-control" name="title_episode" value="<?php echo $row['title_episode'];?>">
					</div>
				</div>
				<div class="form-group mb-3">
	                    <label for="">Durée de l'episode</label>
						<span class="help">- Temps mis de l'episode</span>
	                    <input type="time" class="form-control" name="time" value="<?php echo $row['time'];?>">
	                </div>
				<div class="form-group">
					<label class="form-label">Video Url</label>
					<span class="help">- Vimeo ou n'importe quelle vidéo hébergée</span>
					<div class="controls">
						<input type="text" class="form-control" name="url" id="url" value="<?php echo $row['url'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Thumbnail</label>
					<span class="help">- Image de l'icône du film</span>
					<div class="controls">
						<input type="file" class="form-control" name="thumb">
					</div>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Mettre à jour l'épisode">
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach;?>