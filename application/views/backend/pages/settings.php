<div class="row">
	<div class="col-12">
		<form method="post" action="<?php echo base_url();?>index.php?admin/settings" enctype="multipart/form-data">
			<div class="row">
				<div class="col-6">
			        <div class="card">
			            <div class="card-body">
							<div class="form-group mb-3">
								<label for="simpleinput1">Nom du site</label>
								<input type="text" class="form-control" id = "simpleinput1" name="site_name" value="<?php echo $site_name;?>">
							</div>
							<div class="form-group mb-3">
								<label for="simpleinput2">Adresse Email du site</label>
								<input type="text" class="form-control" id = "simpleinput2" name="site_email" value="<?php echo $site_email;?>">
							</div>

							<!-- TEMPLATE DU SITEWEB -->
							<div class="form-group mb-3">
                                <label for="example-select3">Thème du site</label>
                                <select class="form-control" id="example-select3" name="theme">
									<?php
										$themes = directory_map('./application/views/frontend/', 1);
										//print_r($themes);
										for($i = 0; $i < sizeof($themes) ; $i++) {
											if ($themes[$i] == 'index.php')
												continue;
											$themes[$i] = substr($themes[$i], 0, -1);
											?>
											<option value="<?php echo $themes[$i];?>" <?php if ($theme == $themes[$i])echo 'selected';?>>
												<?php echo $themes[$i];?></option>
											<?php
										}
									?>
                                </select>
                            </div>
			            </div>
			        </div>
			    </div>

				<div class="col-6">
			        <div class="card">
			            <div class="card-body">
							<div class="form-group">
								<label class="form-label">Logo du site</label>
								<span class="help"></span>
								<div class="controls">
									<input type="file" name="logo" />
									<img src="<?php echo base_url();?>assets/global/logo.png" height="20" />
								</div>
							</div>

							<div class="form-group mb-3">
                                <label for="example-textarea">Politique de confidentialité</label>
                                <textarea class="form-control" id="example-textarea" name="privacy_policy" rows="6"><?php echo $privacy_policy;?></textarea>
                            </div>

							<div class="form-group mb-3">
                                <label for="example-textarea">Politique de remboursement</label>
                                <textarea class="form-control" id="example-textarea" name="refund_policy" rows="6"><?php echo $refund_policy;?></textarea>
                            </div>
			            </div>
			        </div>
			    </div>
				<div class="col-4">
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Mettre à jour du réglage">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
