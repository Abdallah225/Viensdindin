<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php?admin/user_create" enctype="multipart/form-data">
					<div class="row">
						<div class="col-6">
							<div class="form-group mb-3">
			                    <label for="name">Nom d'utilisateur</label>
			                    <input type="text" class="form-control" id = "name" name="name">
			                </div>

							<div class="form-group mb-3">
			                    <label for="email">Email d'utilisateur</label>
			                    <input type="email" class="form-control" id = "email" name="email">
			                </div>
							<div class="form-group mb-3">
			                    <label for="password">Mot de passe d'utilisateur</label>
			                    <input type="password" class="form-control" id = "password" name="password">
			                </div>
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Créer">
								<a href="<?php echo base_url();?>index.php?admin/user_list" class="btn btn-secondary">Retour</a>
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
