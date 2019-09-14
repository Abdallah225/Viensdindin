<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Mise à jour du profile</h4>
				<?php
					$user_id	=	$this->session->userdata('user_id');
					$user_detail = $this->db->get_where('user',array('user_id'=>$user_id))->row();
					?>
				<form method="post" action="<?php echo base_url();?>index.php?admin/account" enctype="multipart/form-data">
					<input type="hidden" name="task" value="update_profile" />
					<div class="form-group mb-3">
						<label for="simpleinput1">Votre Nom</label>
						<input type="text" class="form-control" id = "simpleinput1" name="name" value="<?php echo $user_detail->fulname;?>">
					</div>
					<div class="form-group mb-3">
						<label for="simpleinput1">Votre Prenom</label>
						<input type="text" class="form-control" id = "simpleinput1" name="fulname" value="<?php echo $user_detail->name;?>">
					</div>
					<div class="form-group mb-3">
						<label for="simpleinput1">Votre Numero</label>
						<input type="text" class="form-control" id = "simpleinput1" name="number" value="<?php echo $user_detail->number;?>">
					</div>
					<div class="form-group mb-3">
						<label for="simpleinput2">Votre email</label>
						<input type="text" class="form-control" id = "simpleinput2" name="email" value="<?php echo $user_detail->email;?>">
					</div>

					<div class="form-group mb-3">
						<input type="submit" class="btn btn-success" value="Mettre à jour du profile">
					</div>
				</form>
            </div>
        </div>
    </div>

	<div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Changer de mot de passe</h4>

				<?php
					$user_id	=	$this->session->userdata('user_id');
					$user_detail = $this->db->get_where('user',array('user_id'=>$user_id))->row();
					?>
				<form method="post" action="<?php echo base_url();?>index.php?admin/account" enctype="multipart/form-data">
					<input type="hidden" name="task" value="update_password" />
					<div class="form-group mb-3">
	                    <label for="simpleinput3">Nouveau mot de passe</label>
	                    <input type="password" class="form-control" id = "simpleinput3" name="new_password" value="">
	                </div>
					<div class="form-group mb-3">
	                    <label for="simpleinput4">Confirmer le  Nouveau mot de passe</label>
	                    <input type="password" class="form-control" id = "simpleinput4" name="old_password" value="">
	                </div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Mettre à jour du mot de passe">
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
