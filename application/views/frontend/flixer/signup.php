<style>
.card-signin {
    background-color: #595959;
  border: 0;
  border-radius: 2rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

</style>
<div class="container-fluid">
    <a id="return" href="./"><i style="color:#fff;" class="fas fa-arrow-left mt-3 ml-3"></i></a>
</div>
<div class="container">
<h4 class="card-title text-center" style="color:#fff;">Veuillez-vous inscrire</h4>
<?php 
	if ($this->session->flashdata('signup_result') == 'failed'):
?>
		<div class="alert alert-dismissible alert-danger" style="margin: 30px;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo get_phrase('Email_already_exists! Please_try_again');?>.
		</div>
		<?php endif;?>
<div class="row">
    <div class="mx-auto">
    <div class="card card-signin flex-row">
        <div class="card-body">
        <h4 class=" text-center">Informations personelles</h4>
            <hr>
            <form method="post" action="<?php echo base_url();?>index.php?home/signup">
              <div class="row">
                  <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                      <label for="inputEmail4">Nom</label>
                      <input type="text" name="fulname"  class="form-control"  value="<?php set_value('fulname') ?>">
                  </div>
                  <div class="form-label-group col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="inputUserame">Prénom</label>
                    <input type="text"  name="name"  class="form-control" value="<?php set_value('name')?>">
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-4 col-sm-4 col-md-4">
                    <label for="inputEmail4">Indicatif</label>
                    <input type="text" style="text-align:center" disabled class="form-control"  placeholder="+225">
                  </div>
                  <div class="form-label-group col-8 col-sm-8 col-md-8 col-lg-8">
                    <label for="inputUserame">Numéro de téléphone</label>
                    <input type="text"  name="number"  class="form-control" value="<?php set_value('number') ?>">
                  </div>
              </div>
              <div class="row">
                  <div class="form-label-group col-8 col-sm-8 col-md-8 col-lg-8">
                    <label for="inputUserame">Adresse E-mail</label>
                    <input type="name" name="email"   class="form-control" value="<?php set_value('email') ?>">
                  </div>
              </div>
              <div class="row">
                <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="inputEmail4">Mot de passe</label>
                    <input type="password" name="password"  class="form-control" >
                </div>
                <div class="form-label-group col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="inputUserame">Confirmez mot de passe</label>
                    <input type="password" name="password1"  class="form-control">
                  </div>
              </div>
              <br>
              <button class="btn btn-lg  btn-block text-uppercase" name="submit" type="submit">S'enregistrer</button>
              <p class="d-block text-center mt-2 small">Avez-vous deja un compte ? <a  style="color:#fff;" href="<?php echo base_url();?>index.php?home/signin"><span> Cliquez ici </span></a></p>
            </form>
        </div>
    </div>
    </div>
</div>
</div>