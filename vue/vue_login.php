<?php 
    include "vue/vue_entete.php";
?>
<br>
      <div class="rounded-3 col-md-8 row flex-nowrap bg-black bg-opacity-25 w-75 mx-auto p-3 align-self-center">


        <div class="col-md-6 align-self-center">
          <h1 class="text-center text-white">Se connecter</h1>
         <div class="col">
          <form action="#" method="post">


            <div class="form-floating mb-3">
              <input type="email" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Adresse mail</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control form-control-sm" id="floatingPassword" placeholder="Password">
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
          <form action="#" method="post">
            <h1 class="text-center text-white">S'inscrire</h1>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Nom</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Prénom</label>
            </div>

            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Adresse mail</label>
            </div>
            <div class="form-floating mb-3">
              <input type="tel" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Numéro de tél</label>
            </div>

              <div class="mb-3">
                <select class="form-select" name="">
                  <option value="">-- Sélectionner votre statut--</option>
                  <option value="">Etudiant</option>
                  <option value="">Employeur(Professionnel)</option>
                  <option value="">Employeur(Particulier)</option>
                </select>
              </div>

              <div class="input-group mb-3">
               <label class="input-group-text">Photo de profil</label>
                  <input type="file" class="form-control" id="floatingInput" placeholder="name@example.com">
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Mot de passe</label>
              </div>

              <div class="text-center">
                <input class="btn btn-primary align-self-center" type="submit" value="S'inscrire">
              </div>

          </form>
        </div>

      </div>

<?php include_once("vue/vue_footer.php"); ?>