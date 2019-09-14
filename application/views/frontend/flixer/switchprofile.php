<?php include 'header_page.php'; ?>
	<div style="clear: both; text-align: center; padding-top: 100px;">
		<h1><?php echo get_phrase('Who_is_watching');?>?</h1>
		<table align="center" style="background-color: #141414;">
			<tr>
				<td>
					<a href="<?php echo base_url();?>index.php?page/doswitch/user1" class="profile_switcher" style="text-decoration: none;">	
					<img src="<?php echo base_url();?>/assets/global/thumb1.png" class="profile_switcher_img" />
					<br>
					<?php echo $this->crud_model->get_username_of_user('user1');?>
					</a>
				</td>
				<?php
					if ($current_plan_id == 2 || $current_plan_id == 3):
					?>
				<td>
					<a href="<?php echo base_url();?>index.php?page/doswitch/user2" class="profile_switcher" style="text-decoration: none;">	
					<img src="<?php echo base_url();?>/assets/global/thumb2.png" class="profile_switcher_img" />
					<br>
					<?php echo $this->crud_model->get_username_of_user('user2');?>
					</a>
				</td>
				<?php endif;?>
				<?php
					if ($current_plan_id == 3):
					?>
				<td>
					<a href="<?php echo base_url();?>index.php?page/doswitch/user3" class="profile_switcher" style="text-decoration: none;">	
					<img src="<?php echo base_url();?>/assets/global/thumb3.png" class="profile_switcher_img" />
					<br>
					<?php echo $this->crud_model->get_username_of_user('user3');?>
					</a>
				</td>
				<?php endif;?>
				<?php
					if ($current_plan_id == 3):
					?>
				<td>
					<a href="<?php echo base_url();?>index.php?page/doswitch/user4" class="profile_switcher" style="text-decoration: none;">	
					<img src="<?php echo base_url();?>/assets/global/thumb4.png" class="profile_switcher_img" />
					<br>
					<?php echo $this->crud_model->get_username_of_user('user4');?>
					</a>
				</td>
				<?php endif;?>
			</tr>
		</table>
		<br>
		<a href="<?php echo base_url();?>index.php?page/manageprofile" class="profile_manage">
			<?php echo get_phrase('MANAGE_PROFILES');?></a>
	</div>
</div>