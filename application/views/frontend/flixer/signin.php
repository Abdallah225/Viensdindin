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
    <a id="return" href="./"><i style="color:#fff;" class="fas fa-arrow-left mt-5 ml-5"></i></a>
</div>
<div class="container">
<h4 class="card-title text-center" style="color:#fff;">Connectez vous</h4>
<div class="row">
    <div class="mx-auto">
    <div class="card card-signin flex-row my-1">
        <div class="card-body">
            <p class=" text-center">
            Veuille entrez votre numéro de téléphone <br>
            et votre mot de passe pour vous connectez <br>
            </p>
            <hr>
            <form method="post" action="<?php echo base_url();?>index.php?home/signin">
            <div class="row">
                <div class="form-group col-4 col-sm-4 col-md-4">
                    <label for="inputEmail4">Indicatif</label>
                    <input type="text" style="text-align:center" disabled class="form-control" id="inputEmail4" placeholder="+225">
                </div>
                <div class="form-label-group col-8 col-sm-8 col-md-8 col-lg-8">
                    <label for="inputUserame">Numéro de telephone</label>
                    <input type="text"  name="number" id="inputUserame" class="form-control" placeholder="">
                </div>
            </div>
            
              <hr>
              <div class="form-label-group">
                    <label for="inputPassword">Veuillez entrer le Mot de passe</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="" >
              </div>
              <hr>
              <button class="btn btn-lg  btn-block text-uppercase" name="submit" type="submit">Se connecter</button>
              <hr>
              <a style="color:#fff;" class="d-block text-center mt-2 small" href="<?php echo base_url();?>index.php?home/signup">Créer un compte</a>
              <p class="d-block text-center mt-2 small">Un soucis avec votre mot de passe ? <a style="color:#fff;" href="<?php echo base_url();?>index.php?home/forget"><span> Cliquez ici </span></a></p>
            </form>
        </div>
    </div>
    </div>
</div>
</div>