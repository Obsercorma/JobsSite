<?php
    include "vue_entete.php";
?>
      <h1 class="titreprincipal"><b>Activités récentes</b></h1>

      <div class="rounded-3 col-md-8 row flex-nowrap bg-black bg-opacity-50 w-75 mx-auto p-3 align-self-center menu-pleine-hauteur">
            <?php if(!$isStudent): ?>
            <div class="col-md-6">
                <h1 class="text-center text-white">Candidature spontanée</h1>
                <hr>
                <?php foreach($spontaneousCandicacies as $candicacy): ?>
                <div class="bg-primary bg-opacity-25 rounded-3 border border-2 border-primary">
                  <div class="rounded-3 col-md-12 row w-75 mx-auto p-3 align-self-center text-white"><?= $candicacy["nom"] . " " . $candicacy["prenom"] ?></div>
                  <!-- <div class="rounded-3 col-md-12 row w-75 mx-auto p-3 align-self-center text-white">Texte style lettre de motivation</div> -->
                  <div class="d-grid d-md-block text-center">
                    <a href="?section=activitesRecentes&acceptCandidacy=<?=  $candicacy["idOffre"]; ?>&studentCandidacy=<?= $candicacy["idEtudiant"]; ?>" class="btn btn-success mb-3 mx-2 <?= intval($candicacy["statutCandid"]) == 2 ? "disabled" : "" ?>">Accepter</a>
                    <a href="?section=activitesRecentes&declineCandidacy=<?=  $candicacy["idOffre"]; ?>&studentCandidacy=<?= $candicacy["idEtudiant"]; ?>" class="btn btn-danger mb-3 mx-2 <?= intval($candicacy["statutCandid"]) == 3 ? "disabled" : "" ?>">Refuser</a>
                    <a href="?section=unEtud&idEtudiant=<?= $candicacy["idEtudiant"] ?>" class="btn btn-primary mb-3 mx-2">Voir le profil</a>
                  </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="vr border-3 border border-dark rounded-4 p-0"></div> <!-- Barre entre les deux parties -->
            <?php endif; ?>
            <div class="col-md-6 mx-auto">
              <h1 class="text-center text-white"><?= $isStudent ? "Mes candidatures" : "Réponse à une offre" ?></h1>
              <hr>

              <?php foreach($ActiRecentes as $uneActi):?>

              <div class="bg-primary bg-opacity-25 rounded-3 border border-2 border-primary my-2">
                <h3 class="rounded-3 col-md-12 row w-75 mx-auto p-3 align-self-center text-white">Job: <?= $uneActi['intitoffre'] ?></h3>
                <p class="rounded-3 col-md-12 row w-75 mx-auto p-3 align-self-center text-white fw-bold">Employeur: <?= $uneActi['prenomEmployeur'], " ", $uneActi['nomEmployeur'] ?></p>
                  <div class="d-grid d-md-block text-center">
                      <?php if($isStudent): 
                        if($uneActi["statutCandid"] == 2): ?>
                        <p class="mb-3 mx-2 alert alert-success">Votre candidature a été accepté par l'employeur.</p>
                        <p class="text-white fw-bold mb-1">&nbsp;Numéro de téléphone : <?= $uneActi['telEmployeur'] ?></p>
                        <a class="mb-3 mx-2 btn btn-primary" role="button" href="mailto:<?= $uneActi["emailEmployeur"] ?>">Contacter par email</a>
                        <?php elseif($uneActi["statutCandid"] == 3): ?>
                        <p class="mb-3 mx-2 alert alert-danger">Votre candidature a été refusé par l'employeur.</p>
                        <?php else: ?>
                        <p class="mb-3 mx-2 alert alert-warning">Votre candidature n'a pas encore été examiné.</p>
                        <?php endif; ?>  

                      <?php else: ?>
                      <a href="#" class="btn btn-success mb-3 mx-2">Accepter</a>
                      <a href="#" class="btn btn-outline-danger mb-3 mx-2">Refuser</a>
                      <a href="?section=unEtud" class="btn btn-primary mb-3 mx-2">Voir le profil</a>
                      <?php endif; ?>
                  </div>
              </div>
            <?php endforeach; ?>
            </div>

      </div>








<?php include_once("vue/vue_footer.php"); ?>
