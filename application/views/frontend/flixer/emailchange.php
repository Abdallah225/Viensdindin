<?php include 'header_page.php';?>
<br><br><br><br>
<div class="container" style="margin-top: 90px;">
	<div class="row">
		<?php
		if ($this->session->flashdata('status') == 'email_change_failed'):
		?>
			<!-- ERROR MESSAGE --> 
			<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <?php echo get_phrase('Email_already_exists_or_password_wrong_given. Please_try_again');?>
			</div>
		<?php endif;?>
		<div class="col-lg-12">
			<h3 class="text-white">Modifer email</h3>
			<hr>
		</div>
        </div>
        <div class="row">
		<div class="col-lg-12">
			<form method="post" action="<?php echo base_url();?>index.php?page/emailchange">
				<div class="">
					<?php echo get_phrase('email actuel');?> 
				</div>
                <br>
				<div class="text-white"  style="">
					<?php echo $this->crud_model->get_current_user_detail()->email;?>
				</div>
				<br>
				<div class="text-white">Nouveau_email </div>
				<div class="text-white">
					<input type="email" name="new_email" style="padding: 10px; width:40%;" />
				</div>
                <br>
				<div class="">
					<?php echo get_phrase('Mot de passe actuel');?>
				</div>
				<div class="text-white">
					<input type="password" name="old_password" style="padding: 10px; width:40%;" />
				</div>
				<br>
					<button class="btn btn-primary" type="submit"> <?php echo get_phrase('Enregistrer');?> </button>
					<a href="<?php echo base_url();?>index.php?page/youraccount" class="btn btn-default"><?php echo get_phrase('Retour');?></a>
			</form>
		</div>
	</div>
	<hr>
</div>


