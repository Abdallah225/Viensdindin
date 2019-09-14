<footer>
    <div id="footer-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-2">
					<div class="single-footer logo">
					<a href="<?php echo base_url();?>index.php?page/home" class="navbar-brand">
						<img src="<?php echo base_url();?>/assets/global/logo.png" style=" height: 32px;margin-right: 50px;" />
					</a>
					</div>
				</div>
				
				<div class="col-12 col-sm-6 col-md-4 col-lg-2">
					<div class="single-footer">
						<h3><i class="fa fa-user"></i> Home</h3>
						<ul class="link-area">
							<li><a href="<?php echo base_url();?>index.php?page/faq"><i class="fa fa-long-arrow-right"></i>A propos de Viensdindin</a></li>
                            <?php  $sess_id = $this->session->userdata('user_login_status') == 1;?>
                            <?php if($sess_id){?>
                            <li><a href="<?php echo base_url();?>index.php?home/signout"><i class='fa fa-long-arrow-right'></i>Se desabonner</a></li>
                            <?php
                            }else{?>
                                <li><a href="<?php echo base_url();?>index.php?home/signin"><i class='fa fa-long-arrow-right'></i>S'abonner</a></li>
                            <?php
                            }
                            ?>
							<li><a href="<?php echo base_url();?>index.php?general/faq"><i class='fa fa-long-arrow-right'></i>Faq</a></li>
							<!-- <li><a href="profile.php"><i class="fa fa-long-arrow-right"></i>Mon compte</a></li> -->
						</ul>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
					<div class="single-footer">
						<h3><i class="fa fa-info-circle"></i>  Légal</h3>
						<ul class="link-area">
							<li><a href=""><i class="fa fa-long-arrow-right"></i>Conditions d'utilisation</a></li>
							<li><a href=""><i class="fa fa-long-arrow-right"></i>Conditions générales de vente</a></li>
							<li><a href=""><i class="fa fa-long-arrow-right"></i>Mentions légales</a></li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
					<div class="single-footer">
						<h3><i class="fa fa-phone"></i>  Contactez-nous</h3>
						<ul class="link-area">
							<li><a href=""><i class="fa fa-phone"></i>+225 77 45 05 50</a></li>
							<li><a href=""><i class="fa fa-envelope-o"></i>Viensdindin@gmail.com</a></li>
							<li><a href=""><i class="fa fa-globe"></i>www.viensdindins.ci</a></li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-12 col-lg-2">
					<div class="single-footer">
                        <h3><i class="fa fa-heart" aria-hidden="true"></i>  Rejoignez-nous sur</h3>
						<ul class="footer-social list-inline">
							<li class="list-inline-item" ><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li  class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li  class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li  class="list-inline-item"><a href="#"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
				<br><br><br>
				<div class="col-md-12 b-space text-center">
					<a href=""><img src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/images/google-play-badge.png" alt="" srcset="" width="135" height="40"></a>
					<a href=""><img src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/images/app-store-badge.svg" alt="" srcset=""></a>
				</div>
				<br><br><br>
				<div class="col-md-12">
					<div class="copyright-area text-center">
					<p>Copyright © Faire avec le <i class="fa fa-heart" aria-hidden="true"></i> à Babi. Tous droits réservés.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>