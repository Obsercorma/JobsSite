<?php 
    include "vue/vue_entete.php";
?>
<br>
      <div class="rounded-3 col-md-8 row flex-nowrap bg-black bg-opacity-25 w-75 mx-auto p-3 align-self-center">


        <div class="col-md-6 align-self-center">
          <h1 class="text-center text-white">Se connecter</h1>
          <?php if($errMesgConnect != null): ?>
            <p class="text-black alert alert-danger fw-bold"><?= $errMesgConnect ?></p>
          <?php endif; ?>
         <div class="col">
          <form action="" method="post">
            <div class="form-floating mb-3">
              <input type="email" class="form-control form-control-sm" name="userlogin" id="floatingInput" placeholder="name@example.com" required>
              <label for="floatingInput">Adresse mail</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control form-control-sm" name="passwdlogin" id="floatingPassword" placeholder="Password" required>
              <label for="floatingPassword">Mot de passe</label>
            </div>
            <div class="text-center">
              <input class="btn btn-primary align-self-center" type="submit" value="Se connecter">
            </div>


          </form>
          </div>
        </div>

<div class="vr border-3 border border-dark rounded-4 p-0"></div>

        <div class="col-md-6">
          <form action="" method="post">
            <h1 class="text-center text-white">S'inscrire</h1>
            <?php if($errMesgRegister != null): ?>
              <p class="text-black alert alert-danger fw-bold"><?= $errMesgRegister ?></p>
            <?php endif; ?>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="nom" id="floatingInput" placeholder="name@example.com" required>
              <label for="floatingInput">Nom</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="prenom" id="floatingPassword" placeholder="Password" required>
              <label for="floatingPassword">Prénom</label>
            </div>

            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
              <label for="floatingInput">Adresse mail</label>
            </div>
            <div class="form-floating mb-3">
              <input type="tel" class="form-control" name="tel" id="floatingPassword" placeholder="0612345678" required>
              <label for="floatingPassword">Numéro de tél</label>
            </div>
            <div class="mb-3">
              <select name="civ" id="civ" class="form-select">
                <option value="0" selected>-- Selectionnez votre civilité --</option>
                <option value="1" >Monsieur</option>
                <option value="2">Madame</option>
                <option value="3">Autre</option>
              </select>
            </div>
            <div class="mb-3">
              <select class="form-select" name="statut">
                <option value="" selected>-- Sélectionner votre statut--</option>
                <?php foreach($statusChoices as $status): ?>
                  <option value="<?= $status["idStatut"] ?>"><?= $status["intitStatut"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

              <!-- <div class="input-group mb-3">
               <label class="input-group-text">Photo de profil</label>
                  <input type="file" class="form-control" id="floatingInput" placeholder="name@example.com">
              </div> -->

              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="passwd" id="floatingPassword" required>
                <label for="floatingPassword">Mot de passe</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="passwd_check" id="floatingPassword" required>
                <label for="floatingPassword">Verifiez votre mot de passe</label>
              </div>

              <div class="text-center">
                <input class="btn btn-primary align-self-center" type="submit" value="S'inscrire">
              </div>

          </form>
        </div>

      </div>

<?php include_once("vue/vue_footer.php"); ?>