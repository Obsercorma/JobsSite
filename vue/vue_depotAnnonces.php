<?php 
    include "vue/vue_entete.php";
?>
<body>
<br>

    <h1 class="text-center text-white">Déposer une annonce</h1>

      <form action="" method="post" class="rounded-3 col-md-8 row flex-nowrap bg-black bg-opacity-25 w-75 mx-auto p-3 align-self-center">
      

        <div class="col-md-6 align-self-center">
        <?php if($errMesg != null): ?>
        <div class="col">
          <p class="alert alert-danger"><?= $errMesg ?></p>
        </div>
        <?php endif; ?>
        <div class="col">
            <div class="form-floating mb-3">
              <input type="text" name="titre" class="form-control form-control-sm" id="floatingInput" value="<?php if($isEdit){ echo $dataEditAnnon["intitoffre"];} ?>" placeholder="name@example.com" required>
              <label for="floatingInput">Titre de l'annonce</label>
            </div>

            <div class="mb-3">
              <select class="form-select" name="activite">
                <?php foreach($activites as $act): ?>
                <option value="<?= $act["idAct"] ?>" <?php if($isEdit and $act["idAct"] == $dataEditAnnon["idAct"]) {echo "selected";} ?>><?= $act["intitAct"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control form-control-sm" name="lieuTravail" id="floatingInput" placeholder="name@example.com" value="<?php if($isEdit) {echo $dataEditAnnon["lieuTravail"];} ?>" required>
              <label for="floatingInput">Lieu de travail</label>
            </div>

            <div class="form-floating mb-3">
              <input type="date" name="debutPeriode" class="form-control form-control-sm" id="floatingInput" value="<?php if($isEdit) {echo $dataEditAnnon["debutPeriod"];} ?>" required>
              <label for="floatingInput">Début de la période de travail</label>
            </div>

            <div class="form-floating mb-3">
              <input type="date" name="finPeriode" class="form-control form-control-sm" id="floatingInput" value="<?php if($isEdit) {echo $dataEditAnnon["finPeriod"];} ?>" required>
              <label for="floatingInput">Fin de la période de travail</label>
            </div>

            <div class="mb-3 bg-white rounded-1">
              <label class="ms-1 mt-1">Type de contrat</label>
              <br>
              <?php foreach($typeContrats as $contrat): ?>
              <div class="form-check form-check-inline ms-1 me-3">
                <input class="form-check-input border border-1 border-black" type="radio" name="typeContrat" value="<?= $contrat["idContrat"] ?>" <?php if($isEdit and $contrat["idContrat"] == $dataEditAnnon["idContrat"]) {echo "checked";}  ?>>
                <label class="form-check-label"><?= $contrat["intitContrat"] ?></label>
              </div>
              <?php endforeach; ?>

            </div>

            <div class="text-center">
              <input class="btn btn-primary align-self-center" type="submit" value="Publier">
            </div>

          </div>
        </div>

        <div class="vr border-3 border border-dark rounded-4 p-0"></div>

        <div class="col-md-6">
          

          <div class="form-group">
              <label for="floatingTextarea">Description de l'annonce</label>
              <textarea name="description" class="form-control rs-none" id="exampleFormControlTextarea1" rows="10"><?php if($isEdit) {echo $dataEditAnnon["descOffre"];} ?></textarea>
            </div>

          </div>
        </div>
      </form>
  </body>
</html>
