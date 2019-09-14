<?php include 'header_page.php';?>
	<div style="clear: both; text-align: center; padding-top: 100px;">
		<h1 class="text-white"><?php echo ('Gestion du profile');?></h1>
		<table align="center" style="background-color: #141414;">
			<tr>
				<td>
					<a href="<?php echo base_url();?>index.php?page/editprofile/user1" 
						class="profile_switcher" style="text-decoration: none;">	
						<img src="<?php echo base_url();?>/assets/global/thumb1.png" class="profile_switcher_img" />
						<br>
						<span class="fa-stack fa-sm profile_switcher_edit">
						<i class="fa fa-square-o fa-stack-2x"></i>
						<i class="fa fa-pencil fa-stack-1x"></i>
						</span>
						<?php echo $this->crud_model->get_username_of_user('user1');?>
					</a>
				</td>
				<?php
					if ($current_plan_id == 2 || $current_plan_id == 3):
					?>
				<td>
					<a href="<?php echo base_url();?>index.php?page/editprofile/user2" 
						class="profile_switcher" style="text-decoration: none;">	
						<img src="<?php echo base_url();?>/assets/global/thumb2.png" class="profile_switcher_img" />
						<br>
						<span class="fa-stack fa-sm profile_switcher_edit">
						<i class="fa fa-square-o fa-stack-2x"></i>
						<i class="fa fa-pencil fa-stack-1x"></i>
						</span>
						<?php echo $this->crud_model->get_username_of_user('user2');?>
					</a>
				</td>
				<?php endif;?>
				<?php
					if ($current_plan_id == 3):
					?>
				<td>
					<a href="<?php echo base_url();?>index.php?page/editprofile/user3" 
						class="profile_switcher" style="text-decoration: none;">	
						<img src="<?php echo base_url();?>/assets/global/thumb3.png" class="profile_switcher_img" />
						<br>
						<span class="fa-stack fa-sm profile_switcher_edit">
						<i class="fa fa-square-o fa-stack-2x"></i>
						<i class="fa fa-pencil fa-stack-1x"></i>
						</span>
						<?php echo $this->crud_model->get_username_of_user('user3');?>
					</a>
				</td>
				<?php endif;?>
				<?php
					if ($current_plan_id == 3):
					?>
				<td>
					<a href="<?php echo base_url();?>index.php?page/editprofile/user4" 
						class="profile_switcher" style="text-decoration: none;">	
						<img src="<?php echo base_url();?>/assets/global/thumb4.png" class="profile_switcher_img" />
						<br>
						<span class="fa-stack fa-sm profile_switcher_edit">
						<i class="fa fa-square-o fa-stack-2x"></i>
						<i class="fa fa-pencil fa-stack-1x"></i>
						</span>
						<?php echo $this->crud_model->get_username_of_user('user4');?>
					</a>
				</td>
				<?php endif;?>
			</tr>
		</table>
		<br>
		<a href="<?php echo base_url();?>index.php?page/switchprofile" class="profile_manage_done"><?php echo get_phrase('TERMINÉ');?></a>
	</div>
</div>