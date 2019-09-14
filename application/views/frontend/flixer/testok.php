<?php include 'header_page.php';?>
<!-- BACKGROUND IMAGE SECTION-->
<?php include 'background_video.php';?>
<!-- END BACKGROUND IMAGE SECTION -->
<!-- LISTE, THEMATIQUE(GENRE)  -->

<style>
.container-fluid{
	 position: relative;
}
.owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-next{
	color: #cecece;
	font-size: 6rem;
	background: rgb(68, 68, 68);
	background: rgba(0, 0, 0, 0.9);
	position: absolute;
	bottom: 17%;
}
.owl-carousel .owl-nav button.owl-prev{
	left: 0;
}
.owl-carousel .owl-nav button.owl-next{
	right: 0;
}
.owl-stage-outer {
    padding: 10px;
}
.owl-theme .owl-dots{
	display: none;
}
</style>
<?php 
	$genres		=	$this->crud_model->get_genres();
	foreach ($genres as $row):
		// count movie number of this genre, if no found then return.
		$this->db->where('genre_id' , $row['genre_id']);
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
	
  ?>
 <?php 
 
//  select from movies database
	$movies	= $this->crud_model->get_movies($row['genre_id']);
	?>
        <!-- <div class="col-lg-12">
		<div class="owl-carousel owl-theme"> -->
		<?php
		foreach ($movies as $row){

			$rating = $row['rating'];
			if($rating ==0){
				$title	=	$row['title'];
				$link	=	base_url().'index.php?page/playmovie/'.$row['movie_id'];
				$link1 =	base_url().'index.php?home/signin';
				$thumb	=	$this->crud_model->get_thumb_url('movie' , $row['movie_id']);
				$movie_id = $row['movie_id'];
				$url = $row['url'];
				$trailer_url = $row['trailer_url'];
				include 'thumb.php';
			}
			else{
				$title	=	$row['title'];
				$link	=	base_url().'index.php?page/playmovie/'.$row['movie_id'];
				$thumb	=	$this->crud_model->get_thumb_url('movie' , $row['movie_id']);
				$link1 =	base_url().'index.php?home/signin';
				$movie_id = $row['movie_id'];
				$url = $row['url'];
				$trailer_url = $row['trailer_url'];
				include 'thumb_rect.php';
			}
		}
	// select from series database
	// $series_details	=	$this->db->get_where('series' , array('series_id' => $series_id))->result_array();
		$series	= $this->crud_model->get_series($row['genre_id'] );
			foreach ($series as $row){
				$rating = $row['rating'];
				// si rating = 0 la serie sera afficher dans l'ongle horizontal
				if($rating ==0)
				{
					$title	=	$row['title'];
					$link	=	base_url().'index.php?page/playseries/'.$row['series_id'];
					$thumb	=	$this->crud_model->get_thumb_url('series' , $row['series_id']);
					$link1 =	base_url().'index.php?home/signin';
					$series_id = $row['series_id'];
					$trailer_url = $row['trailer_url'];
					// $episode = $row['episode_id'];
					include 'thumb_series.php';
				}
				// Sinon afficher en mode vertical
				else{
					$title	=	$row['title'];
					$link	=	base_url().'index.php?page/playseries/'.$row['series_id'];
					$thumb	=	$this->crud_model->get_thumb_url('series' , $row['series_id']);
					$link1 =	base_url().'index.php?home/signin';
					$series_id = $row['series_id'];
					$trailer_url = $row['trailer_url'];
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
 <script src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/jquery.js" ></script>
 <script src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/js/OwlCarousel/owl.carousel.js" ></script>
<script type="text/javascript">
//     $('.owl-carousel').owlCarousel({
// 	stagePadding: 30,
//     loop:false,
//     margin: 5,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//             nav:false
//         },
//         600:{
//             items:3,
//             nav:false
//         },
//         1000:{
//             items:3,
//             nav:true,
            
//         }
//     }
// })
 // script pour animer les actions sur les differents video au survol des images des differents films
  function playVideof(element){
    $("#"+element.id).on({
      mouseenter: function(){
      $(".action-v-"+element.id).show();
      },
      mouseleave: function(){
        $(".action-v-"+element.id).hide();
      }
    });
  }
  function playVideo(element){
    $("#"+element.id).on({
      mouseenter: function(){
      $(".action-v-"+element.id).show();
      },
      mouseleave: function(){
        $(".action-v-"+element.id).hide();
      }
    });
  }
</script>
</div>
<?php include 'footer.php';?>