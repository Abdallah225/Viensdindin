<?php
	$plan_detail = $this->db->get_where('plan',array('plan_id'=>$plan_id))->row();
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php?admin/plan_edit/<?php echo $plan_id;?>">
					<div class="row">
						<div class="col-8">
							<!--PACKAGE NAME -->
							<div class="form-group mb-3">
			                    <label for="name">Nom du formulaire de payement</label>
			                    <input type="text" class="form-control" id = "name" name="name" value="<?php echo $plan_detail->name;?>">
			                </div>

							<!--PACKAGE PRICE -->
							<div class="form-group mb-3">
			                    <label for="price">Prix</label>
			                    <input type="text" class="form-control" id = "price" name="price" value="<?php echo $plan_detail->price;?>">
			                </div>

							<!-- PACKAGE STATUS -->
							<div class="form-group mb-3">
			                    <label for="price">Status</label>
								<span class="help">Les paquets désactiver ne seront pas montrés au client lors de l'achat.</span>
								<select class="form-control select2" name="status" style="width:150px;">
									<option value="0" <?php if ( $plan_detail->status == 0) echo 'selected';?>>Désactiver</option>
									<option value="1" <?php if ( $plan_detail->status == 1) echo 'selected';?>>Active</option>
								</select>
			                </div>

							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Mettre à jour">
								<a href="<?php echo base_url();?>index.php?admin/plan_list" class="btn btn-secondary">Retour</a>
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
