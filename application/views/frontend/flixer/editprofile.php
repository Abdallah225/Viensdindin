<?php include 'header_page.php';?>

<!-- TOP LANDING SECTION -->
<div style="height:100vh;width:100%; background-color: #141414;">
	<?php
	if ($user == 'user1')
	{
		$username 	=	$this->crud_model->get_username_of_user('user1');
		$thumb	=	'thumb1.png';
	}
	else if ($user == 'user2')
	{
		$username 	=	$this->crud_model->get_username_of_user('user2');
		$thumb	=	'thumb2.png';
	}
	else if ($user == 'user3')
	{
		$username 	=	$this->crud_model->get_username_of_user('user3');
		$thumb	=	'thumb3.png';
	}
	else if ($user == 'user4')
	{
		$username 	=	$this->crud_model->get_username_of_user('user4');
		$thumb	=	'thumb4.png';
	}
	?>
	<div class="container">
		<div class="row">
			<form method="post" id="form" action="<?php echo base_url();?>index.php?page/editprofile/<?php echo $user;?>">
				<div class="col-lg-8 col-lg-offset-2">
					<div style="clear: both; padding-top: 100px;">
						<h1><?php echo get_phrase('Editer_Profile');?></h1>
						<hr style="border-top:1px solid #333;">
					</div>
					<div class="row">
						<div class="col-lg-3">
							<img src="<?php echo base_url();?>/assets/global/<?php echo $thumb;?>" style="height: 160px;" />
						</div>
						<div class="col-lg-9">
							<input type="text" class="input_black" placeholder="Name" value="<?php echo $username;?>" name="username" />
							<br><br>
							<!--<select class="select_black">
								<option>icon </option>
							</select>-->
						</div>
					</div>
					<hr style="border-top:1px solid #333;">
					<br>
					<a href="#" class="btn_block" onClick="submit_form()"><?php echo get_phrase('Sauvegarder');?></a>
					<a href="<?php echo base_url();?>index.php?page/manageprofile" class="btn_blank"><?php echo get_phrase('Retour');?></a>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function submit_form()
	{
		$( "#form" ).submit();
	}
</script>