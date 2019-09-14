<?php include 'header_page.php';?>
<!-- BACKGROUND IMAGE SECTION-->
<?php include 'background_video.php';?>
<!-- END BACKGROUND IMAGE SECTION -->
<!-- LISTE, THEMATIQUE(GENRE)  -->

<div class="container-fluid">
<div class="row" style="margin:20px 60px; margin-top: 90px;">
<h4 class="text-white" style="text-transform: capitalize;">
			Total<?php 
			echo ' _ Films';
			$total_result = $this->db->count_all_results('movie');
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
        $total_result = $this->db->count_all_results('movie');
        if ($total_result == 0)
        	continue;
	?>
	?>
    <div class="container-fluid">
  <div class="titre">
  <h4><?php echo $row['name'];?></h4>
  </div> 
  <div class="row">
 <?php
	//  select from movies database
	$movies	= $this->crud_model->get_movies($row['genre_id'] );
	?>
        <!-- <div class="col-lg-12">
		<div class="owl-carousel owl-theme"> -->
		<?php
		foreach ($movies as $row)
		{
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
		?>
			</div>
			</div>
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