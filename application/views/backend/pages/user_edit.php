<?php
	$user_detail = $this->db->get_where('user',array('user_id'=>$edit_user_id))->row();
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php?admin/user_edit/<?php echo $edit_user_id;?>"
					<div class="row">
						<div class="col-6">
							<div class="form-group mb-3">
			                    <label for="name">Nom</label>
			                    <input type="text" class="form-control" id = "name" name="fulname" value="<?php echo $user_detail->fulname; ?>">
			                </div>
							<div class="form-group mb-3">
			                    <label for="name">Prenom</label>
			                    <input type="text" class="form-control" id = "name" name="name" value="<?php echo $user_detail->name; ?>">
			                </div>
							<div class="form-group mb-3">
			                    <label for="name">Numéro de telephone</label>
			                    <input type="text" class="form-control" id = "number" name="number" value="<?php echo $user_detail->number; ?>">
			                </div>

							<div class="form-group mb-3">
			                    <label for="email">Email utilisateur</label>
			                    <input type="email" class="form-control" id = "email" name="email" value="<?php echo $user_detail->email; ?>">
			                </div>
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Mise a jour d'utilisateur">
								<a href="<?php echo base_url();?>index.php?admin/user_list" class="btn btn-secondary">Retour</a>
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
