<?php include 'header_page.php';?>
<div class="container" style="margin-top: 90px;">
	<div class="row">
		<!-- NOTIFICATION MESSAGES ENDS -->
		<div class="col-lg-12">
			<h3 class="text-white">Mon compte</h3>
			<hr>
		</div>
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-4">
					<span style="font-size: 20px;">ADHÉSION ET FACTURATION</span>
					<br>
					<?php
						if ( $this->crud_model->validate_subscription() == false):
						?>
					<a href="<?php echo base_url();?>index.php?page/purchaseplan" 
						class="btn btn-primary" style="margin:10px 0px;"> 
							<?php echo get_phrase("Achat d'un abonnement");?> </a>
					<?php endif;?>
					<?php
						if ( $this->crud_model->validate_subscription() != false):
						?>
					<a href="<?php echo base_url();?>index.php?page/cancelplan" 
						class="btn btn-default" style="margin:10px 0px;"> 
							<?php echo get_phrase("Annuler l'adhésion");?> </a>
					<?php endif;?>
				</div>
				<div class="col-lg-8">
					<div class="row" style="margin: 5px;">
						<div class="col-6" >
							<b><?php echo $this->crud_model->get_current_user_detail()->email;?></b>
						</div>
						<div class="col-6">
							<a class="text-white" href="<?php echo base_url();?>index.php?page/emailchange" class="blue_text">Changer l'email</a>
						</div>
					</div>
					<hr class="my-4">
					<div class="row" style="margin: 5px;">
						<div class="col-5" >
							<b>+225 <?php echo $this->crud_model->get_current_user_detail()->number;?></b>
						</div>
						<div class="col-7">
							<a class="text-white" href="<?php echo base_url();?>index.php?page/numberchange" class="blue_text">Changer le numero de téléphone</a>
						</div>
					</div>
					<hr class="my-4">
					<div class="row" style="margin: 5px;">
						<div class="col-6">
							<?php echo get_phrase('mot_de_passe');?> : ******</div>
						<div class="col-6">
							<a class="text-white" href="<?php echo base_url();?>index.php?page/passwordchange" class="blue_text">Changer le mot de passe</a>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-4">
					<span style="font-size: 20px;">Mon profile</span>
					<br>
				</div>
				<div class="col-lg-8">
					<div class="row" style="margin: 5px;">
						<div class="col-6">
							<img src="<?php echo base_url();?>assets/global/<?php echo $bar_thumb;?>" style="margin:10px 10px 10px 0px; height: 30px;" />
							<?php echo $this->crud_model->get_current_user_detail()->fulname;?> <?php echo $bar_text;?>
							<br>
						</div>
						<div class="col-6">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
</div>
