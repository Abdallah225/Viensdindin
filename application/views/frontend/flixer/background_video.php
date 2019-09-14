<?php
    // verifier l'etat de la colonne featured si featured==1 alors
    // selection de la page serie et la page home
  if($page_name=='series'|| $page_name=='home'){
    // jointure pour obtenu les information de la table episode, series et seson
    $featured_series = $this->db->join('series ', 'episode.series_id = series.series_id')->join('season ', 'episode.season_id = season.season_id')->get_where('episode', array('featured'=>0))->row();
  // selection des autres pages
  }else{
    $featured_movie		=	$this->db->get_where('movie', array('featured'=>1))->row();
  }
?>
<section id="main-image">
  <div class="embed-container">
  <?php 
  // choix pour affichage de l'image et la video de la vedette
  if($page_name=='series'|| $page_name=='home'){?>
    <img class="img-fluid" src="<?php echo $this->crud_model->get_poster_url('movie' , $featured_series->series_id);?>" alt="Responsive image" srcset="" >
    <iframe  src="<?php echo $featured_series->trailer_url; ?>?api=1&background=1&mute=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
  <?php 
  // condition pour autre page
  }else{ ?>
  <img class="img-fluid" src="<?php echo $this->crud_model->get_poster_url('series' , $featured_movie->movie_id);?>" alt="Responsive image" srcset="" >
  <iframe  src="<?php echo $featured_movie->trailer_url; ?>?api=1&background=1&mute=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
  <?php
  }
  ?>
  </div>
  <div class=" h-100">
    <div class="d-flex h-100">
      <div class="w-100 text-white">
        <div class="h-10">
        <?php 
        // choix sur l'image du titre
        if($page_name=='series'|| $page_name=='home'){
        ?>
        <?php echo $featured_series->title; ?>
        <?php
        // autre page
        }else{?>
          <img class="img-fluid"  src="<?php echo $this->crud_model->get_title_url('movie' , $featured_movie->movie_id);?>" alt="Responsive image" style="margin: 18px 0px; width: 320px;"/>
        <?php
        }
        ?>
        </div>
        <?php 
        // choix de la saison et l'episode
        if($page_name=='series'|| $page_name=='home'){
          ?>
          <p class="mt-1" id="info-saison-episode"><?php echo $featured_series->name;?> - <?php echo $featured_series->name_episode;?>  </p>
        <?php
        // rien n'afficher sur c'est un film
        }else{?>
        
        <?php
        }
        ?>
        <?php 
        // choix de la description
        if($page_name=='series'|| $page_name=='home'){?>
            <p class="lead text mt-1" style="color: #fff">
            <?php echo $featured_series->description_short;?>
            </p>
        <?php
        }else{?>
        <p class="lead text mt-1" style="color: #fff">
        <?php echo $featured_movie->description_short;?>
            </p>
        <?php
        }
        ?>
            
            <?php 
            // choix de la durée 
            if($page_name=='series'|| $page_name=='home'){?>
             <p class="type-serie mt-1" style="color: #fff ;font-weight: 700;">
                SERIE  &nbsp | &nbsp COMEDIE &nbsp |  &nbsp <?php echo $featured_series->time; ?>
            </p>
            <?php
            }else{?>
             <p class="type-serie mt-1" style="color: #fff ;font-weight: 700;">
                FILM  &nbsp | &nbsp COMEDIE &nbsp |  &nbsp <?php echo $featured_movie->time; ?>
            </p>
            <?php
            }?>
           
            <?php ?>
          <?php  $sess_id = $this->session->userdata('user_login_status') == 1;?>
          <?php if($sess_id){?>
          <?php 
          // redirection des page 
          if($page_name=='series'||$page_name=='home'){?>
            <a class="btn btn-primary  mt-1" href="<?php echo base_url();?>index.php?page/playseries/<?php echo $featured_series->series_id;?>"> 
          <?php
          }else{?>
            <a class="btn btn-primary  mt-1" href="<?php echo base_url();?>index.php?page/playmovie/<?php echo $featured_movie->movie_id;?>"> 
          <?php
          }
          ?>
          <?php }else{?>
            <a class="btn btn-primary  mt-1" href="<?php echo base_url();?>index.php?home/signin"> 
            <?php
            }
            ?>
            <b><i class="fas fa-play"></i> <?php echo get_phrase('REGARDER &nbsp');?></b>
            </a>                
      </div>
    </div>
  </div>
</section>
