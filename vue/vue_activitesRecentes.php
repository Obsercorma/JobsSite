<?php
    include "vue_entete.php";
?>
      <h1 class="titreprincipal"><b>Activités récentes</b></h1>

      <div class="rounded-3 col-md-8 row flex-nowrap bg-black bg-opacity-50 w-75 mx-auto p-3 align-self-center menu-pleine-hauteur">
            <?php if(!$isStudent): ?>
            <div class="col-md-6">
                <h1 class="text-center text-white">Candidature spontanée</h1>
                <hr>
                <div class="bg-primary bg-opacity-25 rounded-3 border border-2 border-primary">
                  <div class="rounded-3 col-md-12 row w-75 mx-auto p-3 align-self-center text-white">Prénom / Nom</div>
                  <div class="rounded-3 col-md-12 row w-75 mx-auto p-3 align-self-center text-white">Texte style lettre de motivation</div>
                  <div class="d-grid d-md-block text-center">
                      <a href="#" class="btn btn-success mb-3 mx-2">Accepter</a>
                      <a href="#" class="btn btn-outline-danger mb-3 mx-2">Refuser</a>
                      <a href="?section=unEtud" class="btn btn-primary mb-3 mx-2">Voir le profil</a>
                  </div>
                </div>
            </div>

            <div class="vr border-3 border border-dark rounded-4 p-0"></div> <!-- Barre entre les deux parties -->
            <?php endif; ?>
            <div class="col-md-6">
              <h1 class="text-center text-white"><?= $isStudent ? "Mes candidatures" : "Réponse à une offre" ?></h1>
              <hr>

              <?php
                    foreach($ActiRecentes as $uneActi)
                    {
                      $idEtudiant = $uneActi['idEtudiant'];
                      $intitOffre = $uneActi['intitoffre'];
                      $idAct = $uneActi['idAct'];
                      $lieuTravail = $uneActi['lieuTravail'];
                      $prenom = $uneActi['prenom'];
                      $nom = $uneActi['nom'];

              ?>

              <div class="bg-primary bg-opacity-25 rounded-3 border border-2 border-primary my-2">
                <h3 class="rounded-3 col-md-12 row w-75 mx-auto p-3 align-self-center text-white">Job: <?= $intitOffre ?></h3>
                <p class="rounded-3 col-md-12 row w-75 mx-auto p-3 align-self-center text-white fw-bold">Employeur: <?= $prenom, " ", $nom ?></p>
                  <div class="d-grid d-md-block text-center">
                      <a href="#" class="btn btn-success mb-3 mx-2">Accepter</a>
                      <a href="#" class="btn btn-outline-danger mb-3 mx-2">Refuser</a>
                      <a href="?section=unEtud" class="btn btn-primary mb-3 mx-2">Voir le profil</a>
                  </div>
              </div>
            <?php
                    } 
            ?>
            </div>

      </div>








<?php include_once("vue/vue_footer.php"); ?>
