<div class="col-12 col-md-6 col-lg-4 "> 
<div class="card1 action-<?php echo $episode_id ?>" onmouseover='playVideo(this)' id='<?php echo $episode_id ?>'>
  <div class="card1-image"><!-- card1 image -->
    <div class="embed-responsive embed-responsive-16by9">
      <img class="img-fluid overlayImage" src="<?php echo $thumb;?>" alt="Responsive image" srcset="">
      <iframe src="<?php echo $trailer_url  ?>" width="640" height="230" frameborder="0" allow="; fullscreen" allowfullscreen id="player1" class="thevideo action-v-<?php echo $episode_id ?>"></iframe>
      <div class="card1-content action-v-<?php echo $episode_id ?>">
    <div class="container">
      <span class="card1-title"><?php echo $name ?> - <?php echo $name_episode ?></span>
      <span class="card1-etoil"></span>
      <span class="card1-time mt-1"><?php  ?></span>
      <?php ?>
          <?php  $sess_id = $this->session->userdata('user_login_status') == 1;?>
          <?php if($sess_id){?>
          <a style="float: right; margin-left:12px;" class="btn btn-primary mt-2" href="<?php echo $link?>"> 
          <?php }else{?>
            <a style="float: right; margin-left:12px;" class="btn btn-primary mt-2" href="<?php echo $link1?>"> 
            <?php
            }
            ?>
          <b><i class="fas fa-play"></i> <?php echo get_phrase('REGARDER &nbsp');?></b>
      </a>
    </div>
    </div><!-- card1 content -->
    </div>
    </div>
    </div>
    </div>