<footer>
    <div id="footer-area">
		<div class="viewport">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-2">
					<div class="single-footer logo">
						<a href=""><img src="asset/images/Logo_viendindin.png" alt="" width="150"></a>
					</div>
				</div>
				<br><br><br>
				<div class="col-12 col-sm-6 col-md-4 col-lg-2">
					<div class="single-footer">
						<h3><i class="fa fa-user"></i>  HOME</h3>
						<ul class="link-area">
							<li><a href="a-propos.php"><i class="fa fa-long-arrow-right"></i>A propos de Viensdin</a></li>
							<?php 
							if (!empty($_SESSION['id']))
							{
							echo "<li><a href='php/logout.php'><i class='fa fa-long-arrow-right'></i>Se désabonner</a></li>";
							}
							else
							{
								echo "<li><a href='login.php'><i class='fa fa-long-arrow-right'></i>S'abonner</a></li>";
							}
								
							?>
							<li><a href="profile.php"><i class="fa fa-long-arrow-right"></i>Mon compte</a></li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
					<div class="single-footer">
						<h3><i class="fa fa-info-circle"></i>  LÉGAL</h3>
						<ul class="link-area">
							<li><a href="pages/condition.php"><i class="fa fa-long-arrow-right"></i>Conditions d'utilisation</a></li>
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
					<a href=""><img src="asset/images/google-play-badge.png" alt="" srcset="" width="135" height="40"></a>
					<a href=""><img src="asset/images/app-store-badge.svg" alt="" srcset=""></a>
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