<?php include 'header_page.php';?>
<!-- BACKGROUND IMAGE SECTION-->
<?php include 'background_video.php';?>
<!-- END BACKGROUND IMAGE SECTION -->
<!-- LISTE, THEMATIQUE(GENRE)  -->
<div class="container-fluid">
<div class="row" style="margin:20px 60px; margin-top: 90px;">
<h4 class="text-white" style="text-transform: capitalize;">
			Total<?php 
			echo ' _ Séries';
			$total_result = $this->db->count_all_results('series');
			?> 
			(<?php echo $total_result;?>)
	</h4>
</div>
</div>
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
  <h4><?php echo $row['name'];?></h4>
  </div> 
  <div class="row">
 <?php
	// select from series database
	
	$episode		=	$this->crud_model->get_episode($row['genre_id']);
			foreach ($episode as $row){
				$rating = $row['rating'];
				// si rating = 0 la serie sera afficher dans l'ongle horizontal
				if($rating ==0)
				{
					$title	=	$row['title'];
					$link	=	base_url().'index.php?page/playseries/'.$row['series_id'];
					$thumb	=	$this->crud_model->get_thumb_url('episode' , $row['episode_id']);
					$link1 =	base_url().'index.php?home/signin';
					$series_id = $row['series_id'];
					$season_id = $row['season_id'];
					$episode_id = $row['episode_id'];
					$name_episode = $row['name_episode'];
					$name = $row['name'];
					$trailer_url = $row['url'];
					include 'thumb_series.php';
				}
				// Sinon afficher en mode vertical
				else{
					$title	=	$row['title'];
					$link	=	base_url().'index.php?page/playseries/'.$row['series_id'];
					$thumb	=	$this->crud_model->get_thumb_url('episode' , $row['episode_id']);
					$link1 =	base_url().'index.php?home/signin';
                    $season_id = $row['season_id'];
                    $episode_id = $row['episode_id'];
					$trailer_url = $row['trailer_url'];
					$name_episode = $row['name_episode'];
					$name = $row['name'];
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/owl.carousel.min.js"></script>
<script type="text/javascript">
    // $('.owl-carousel').owlCarousel({
    //     autoPlay: 3000, //Set AutoPlay to 3 seconds
    //     items : 4,
    //     margin: 10,
    //     itemsDesktop : [1199,3],
    //     itemsDesktopSmall : [979,3]
    // })
 // script pour animer les actions sur les differents video au survol des images des differents films
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