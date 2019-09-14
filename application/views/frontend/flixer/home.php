<?php include 'header_page.php';?>
<?php 
// BACKGROUND IMAGE SECTION
include 'background_video.php';
?>
<?php 
// appel du crud_model genre
	$genres		=	$this->crud_model->get_genres();
	foreach ($genres as $row):
		$this->db->where('genre_id' , $row['genre_id']);
		// methode de comptage du nombre total de series existant
		// afficher les informations du genre si la serie existe
        $total_result = $this->db->count_all_results('series');
        if ($total_result == 0)
        	continue;
	?>
<div class="container-fluid">
<div class="titre">
	<h4 class="title"><?php echo $row['name'];?></h4>
</div> 
<div class="row" style="">
<?php 
	//  appel du crud_mode movie 
	$movies	= $this->crud_model->get_movies($row['genre_id']);
?>
        <!-- <div class="col-lg-12">
		<div class="owl-carousel owl-theme"> -->
<?php
	foreach ($movies as $row){
		// declaration des variable
		$title			=	$row['title'];
		$link			=	base_url().'index.php?page/playmovie/'.$row['movie_id'];
		$link1 			=	base_url().'index.php?home/signin';
		$thumb			=	$this->crud_model->get_thumb_url('movie' , $row['movie_id']);
		$movie_id 		= 	$row['movie_id'];
		$url 			= 	$row['url'];
		$trailer_url	= 	$row['trailer_url'];
		$rating = $row['rating'];
		// conditionnement pour l'afficharge horizontal ou vertical
		// si rating == 0 affichage horizontal
			if($rating ==0){
				include 'thumb.php';
			}
			else{
				include 'thumb_rect.php';
			}
		}
	// appel du crud_model jointure episode
	$episode	=	$this->crud_model->get_episode($row['genre_id']);
	foreach ($episode as $row){
		// declaration des variable
		$title			=	$row['title'];
		$link			=	base_url().'index.php?page/playseries/'.$row['series_id'].'/'.$row['season_id'].'/'.$row['episode_id'];
		$thumb			=	$this->crud_model->get_thumb_url('episode' , $row['episode_id']);
		$link1 			=	base_url().'index.php?home/signin';
		$series_id 		= 	$row['series_id'];
		$season_id 		= 	$row['season_id'];
		$episode_id 	= 	$row['episode_id'];
		$name_episode 	= 	$row['name_episode'];
		$name 			= 	$row['name'];
		$trailer_url	= 	$row['url'];
		$rating 		= 	$row['rating'];
		// conditionnement pour l'afficharge horizontal ou vertical
		// si rating == 0 affichage horizontal
		if($rating ==0){
			include 'thumb_series.php';
			}
		// Sinon afficher en mode vertical
		else{
			include 'thumb_rect_serie.php';
			}
		}
			
	?>
		<!-- </div>
		</div> -->
	<?php
	endforeach
	?>
  </div>
 </div>
</div>
<?php include 'footer.php';?>