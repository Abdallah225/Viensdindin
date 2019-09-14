<?php include 'header_page.php';?>
<div class="container" style="margin-top: 90px;">
	<div class="row">
		<?php
			if ($this->session->flashdata('status') == 'password_change_failed'):
			?>
		<!-- ERROR MESSAGE --> 
		<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo get_phrase('Current_password_given_wrong_or_New_password_must_be_at_least_6_character_long. Please_try_again.');?>
		</div>
		<?php endif;?>
		<div class="col-lg-12">
			<h3 class="text-white"><?php echo get_phrase('changer le mot de passe');?></h3>
			<hr>
		</div>
		<div class="col-lg-12">
			<form method="post" action="<?php echo base_url();?>index.php?page/passwordchange">
			<div class="row">
				<div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="inputEmail4">Mot de passe actuel</label>
                    <input type="password" name="old_password"  class="form-control">
                </div>
				<div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="inputEmail4">Nouveau mot de passe</label>
                    <input type="password" name="new_password"  class="form-control">
                </div>
			</div>
				<br>
				<button class="btn btn-primary" type="submit"> <?php echo get_phrase('Sauvegarder');?> </button>
				<a href="<?php echo base_url();?>index.php?page/youraccount" class="btn btn-default"><?php echo get_phrase('Retour');?></a>
			</form>
		</div>
	</div>
	<hr>
</div>