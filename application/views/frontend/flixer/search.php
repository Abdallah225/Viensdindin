<?php include 'header_page.php';?>
<!-- liste des film, serie, genre et episode -->
<br><br><br><br><br><br>
<?php
	$movies		=	$this->crud_model->get_search_result('movie' , $search_key);
	$series		=	$this->crud_model->get_search_result('series', $search_key);
	?>
<div class="container-fluid">
<h4 style="color:#fff;">
	<?php echo get_phrase('Résultat de recherche pour');?> : "<?php echo $search_key;?>"
</h4>
<div class="row">

<?php 
	foreach ($movies as $row){
		$rating = $row['rating'];
		if($rating == 0){
			$title			=	$row['title'];
			$link			=	base_url().'index.php?page/playmovie/'.$row['movie_id'];
			$link1 			=	base_url().'index.php?home/signin';
			$thumb			=	$this->crud_model->get_thumb_url('movie' , $row['movie_id']);
			$movie_id 		= 	$row['movie_id'];
			$url 			= 	$row['url'];
			$trailer_url	= 	$row['trailer_url'];
			include 'thumb.php';
		}
		else{
			$title			=	$row['title'];
			$link			=	base_url().'index.php?page/playmovie/'.$row['movie_id'];
			$thumb			=	$this->crud_model->get_thumb_url('movie' , $row['movie_id']);
			$link1 			=	base_url().'index.php?home/signin';
			$movie_id 		=	$row['movie_id'];
			$url 			=	$row['url'];
			$trailer_url	=	$row['trailer_url'];
			include 'thumb_rect.php';
		}
	}
	foreach ($series as $row){
		$rating = $row['rating'];
		// si rating = 0 la serie sera afficher dans l'ongle horizontal
		if($rating ==0)
		{
			$title			=	$row['title'];
			$link			=	base_url().'index.php?page/playseries/'.$row['series_id'];
			$thumb			=	$this->crud_model->get_thumb_url('series' , $row['series_id']);
			$link1  		=	base_url().'index.php?home/signin';
			$series_id 		=	$row['series_id'];
			$trailer_url 	=	$row['trailer_url'];
			include 'thumb_series.php';
		}
		// Sinon afficher en mode vertical
		else{
			$title			=	$row['title'];
			$link			=	base_url().'index.php?page/playseries/'.$row['series_id'];
			$thumb			=	$this->crud_model->get_thumb_url('series' , $row['series_id']);
			$link1 			=	base_url().'index.php?home/signin';
			$series_id 		=	$row['series_id'];
			$trailer_url 	=	$row['trailer_url'];
			include 'thumb_rect_serie.php';
		}
	}
?>
</div>	
</div>
<!-- include footer -->
<?php 
// include 'footer.php';
?>