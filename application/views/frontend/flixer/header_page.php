<nav class="navbar navbar-expand-lg  navbar-dark fixed-top">
	<a class="navbar-brand" href="<?php echo base_url();?>index.php">
		<img class="navbar-brand"  src="<?php echo base_url();?>/assets/global/logo.png" alt="Responsive image" style="margin: 18px 18px; width: 160px;" />
	</a>
	<button class="navbar-toggler" onclick="function()" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
<?php 
// verification de l'etat de la session
$sess_id = $this->session->userdata('user_login_status') == 1;
// si la session existe 
if($sess_id){
?>
<div class="collapse navbar-collapse" id="navbarResponsive">
	<form action="<?php echo base_url();?>index.php?page/search" method="post">
		<input id="search" class="btn btn-outline-dark my-2 my-sm-0" type="text" name="search_key" placeholder="Que recherchez vous ?"> 
	</form>
<br><br>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link <?php if($page_name == 'home')echo 'active'; ?>" href="<?php echo base_url();?>index.php"><?php echo get_phrase('Accueil');?>
			<span class='sr-only'>(current)</span>
			</a>
		</li>
		<li class="nav-item">
		<?php
		$genres		=	$this->crud_model->get_genres();
		foreach ($genres as $row)
		{
		}
		?>
			<a class="nav-link <?php if($page_name == 'movie')echo 'active'; ?>" href="<?php echo base_url();?>index.php?page/movie"><?php echo get_phrase('Films');?></a>
		</li>
		<li class="nav-item">
		<?php
		$genres		=	$this->crud_model->get_genres();
		foreach ($genres as $row)
		{
		}
		?>
			<a class="nav-link <?php if($page_name == 'series')echo 'active'; ?>" href="<?php echo base_url();?>index.php?page/series"><?php echo get_phrase('Séries');?></a>
		</li>
		<?php
				// Par de defaut le nom de l'utilisateur et l'image de l'icon est affiché en haut
			$bar_text	=	$this->db->get_where('user', array('user_id'=>$this->session->userdata('user_id')))->row()->name;
			$bar_thumb	=	'thumb1.png';
				// check if there is active subscription
			$subscription_validation	=	$this->crud_model->validate_subscription();
			if ($subscription_validation != false)
			{
				// if there is active subscription, check the selected/active user of current user account	
				$active_user	=	$this->session->userdata('active_user');
				if ($active_user == 'user1')
					{
					$bar_text 	=	$this->crud_model->get_username_of_user('user1');
					$bar_thumb	=	'thumb1.png';
					}
				else if ($active_user == 'user2')
					{
					$bar_text 	=	$this->crud_model->get_username_of_user('user2');
					$bar_thumb	=	'thumb2.png';
					}
				else if ($active_user == 'user3')
					{
					$bar_text 	=	$this->crud_model->get_username_of_user('user3');
					$bar_thumb	=	'thumb3.png';
					}
				else if ($active_user == 'user4')
					{
					$bar_text 	=	$this->crud_model->get_username_of_user('user4');
					$bar_thumb	=	'thumb4.png';
					}
			}
		?>
	<div class="dropdown">
		<button class="btn btn-secondary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<img src="<?php echo base_url();?>assets/global/<?php echo $bar_thumb;?>" 
				style="height:30px; border-radius: 50%;" />
				<?php echo $bar_text;?>
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item " href="<?php echo base_url();?>index.php?page/youraccount"><?php echo get_phrase('Mon_Compte');?></a>
			<?php 
			// Afficher le lien de l'adminstrateur si admin est connu
			if($this->session->userdata('login_type') == 1):
			?>
				<a class="dropdown-item " href="<?php echo base_url();?>index.php?admin/dashboard"><?php echo get_phrase('Admin');?></a>
			<?php endif;?>
				<a class="dropdown-item " href="<?php echo base_url();?>index.php?home/signout"><?php echo get_phrase('deconnecter');?></a>
		</div>
	</div>
		<?php
		// si la
		}else{?>

		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link active" href="<?php echo base_url();?>index.php"><?php echo get_phrase('Accueil');?>
						<span class='sr-only'>(current)</span>
					</a>
				</li> 
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>index.php?home/signup"><?php echo get_phrase('Inscription');?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>index.php?home/signin"><?php echo get_phrase('Connexion');?></a>
				</li>
			</ul>
		</div> 
		
		<?php
		}
		?>

	</ul>
</div> 
</nav>

