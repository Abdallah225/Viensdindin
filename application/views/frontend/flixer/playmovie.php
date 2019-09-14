<link  rel ="stylesheet" href ="https://cdn.plyr.io/3.5.3/plyr.css"/>
<style>
.plyr__video-embed{
  padding-bottom: 5%;
}
.logovideo{
  position: absolute;
  left:84%;
  top:25px;
}
.opts{
  position: absolute;
}
.return{
  position: absolute;
  left: 20px;
}
.option{
  position: absolute;
  left:84%;
}
i{
  font-size: 200%;
}
</style>
<?php
	$movie_details	=	$this->db->get_where('movie' , array('movie_id' => $movie_id))->result_array();
	foreach ($movie_details as $row):
	?>
<div class="plyr__video-embed" id="player">
	<!-- check si url = url youtube -->
	<?php
		if (video_type($row['url']) == 'youtube'): ?>
		<iframe
				src="<?php echo $row['url'];?>?autoplay=1&amp;loop=false&amp;byline=false&amp;portrait=false&amp;title=1&amp;speed=false&amp;transparent=0&amp;gesture=media"
				allowfullscreen
				allowtransparency
				allow="autoplay">
		</iframe>

		<!-- check si url= url vimeo -->
		<?php elseif (video_type($row['url']) == 'vimeo'):
			$vimeo_video_id = get_vimeo_video_id($row['url']); ?>
		<iframe
			src="https://player.vimeo.com/video/<?php echo $vimeo_video_id; ?>?autoplay=1&amp;loop=false&amp;byline=false&amp;portrait=false&amp;title=1&amp;speed=false&amp;transparent=0&amp;gesture=media"
			allowfullscreen
			allowtransparency
			allow="autoplay">
		</iframe>
		<!-- check si url = autre mp4 .... -->
		<?php else :?>
		<video class="movie_player" poster="<?php echo $this->crud_model->get_thumb_url('movie' , $row['movie_id']);?>" id="player" playsinline controls>
		<?php if (get_video_extension($row['url']) == 'mp4'): ?>
		<source src="<?php echo $row['url']; ?>" type="video/mp4">
		<?php elseif (get_video_extension($row['url']) == 'webm'): ?>
		<source src="<?php echo $row['url']; ?>" type="video/webm">
		<?php else: ?>
		<h4><?php get_phrase('video_url_is_not_supported'); ?></h4>
		<?php endif; ?>
		<track kind="captions" label="English captions" src="<?php echo base_url('assets/global/movie_caption/'.$row['movie_id'].'.vtt'); ?>" srclang="en" default>
		</video>
		<!-- end check si url = autre mp4 .... -->
		<?php endif; ?>
</div>
<div class="logovideo">
<img class="img-fluid" src="<?php echo base_url();?>/assets/global/logo.png" alt="Responsive image" width="150">
</div>
<div class="opts">
<a class="return" id="return" href="<?php echo base_url();?>index.php"><i style="color:#fff;" class="fas fa-arrow-circle-left"></i></a> 
<div class="option"> 
<!-- <a  id="return" href=""><i class="fas fa-list-ul"></i></a><br><br>
<a  id="return" href=""><i class="fas fa-closed-captioning"></i></a> -->
</div>
</div>
<?php endforeach;?>
<script src="https://player.vimeo.com/api/player.js"></script>
  <script>
    <!- Your Vimeo SDK player script goes here ->
  </script>