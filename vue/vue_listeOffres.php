<?php
    include "vue/vue_entete.php";
?>
    <h1 class="title fw-bold">Liste offres</h1>


    <section class="list-students">


      <div class="cards">
          <div class="row justify-content-around mb-3">

                      <?php
                            $comptage = 0;
                            if(is_array($lesOffres)){
                            foreach($lesOffres as $uneOffre)
                            {
                              $idOffre = $uneOffre['idOffre'];
                              $intitOffre = $uneOffre['intitoffre'];
                              $secteur = $uneOffre['intitAct'];
                              $description = $uneOffre['descOffre'];
                      ?>
                                <div class="card text-center fw-bold col-3 border-3 border-dark">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <img src="vue/images/user.png" alt="Etudiant" class="img-student w-75">
                                        <h3 class="student-name"><?= $intitOffre ?></h3>
                                        <h5 class="student-name">Secteur : <?= $secteur ?></h5>
                                    </div>
                                    <div class="card-footer">
                                      <p class="card-text"><?= $description ?></p>
                                      <?php if($isConnected): ?>
                                      <a href="index.php?section=uneOffre&idOffre=<?= $idOffre ?>" class="btn btn-primary fw-bold border-2">En savoir plus</a>
                                      <?php else: ?>
                                      <a href="index.php?section=login" class="btn btn-primary fw-bold border-2">Se connecter/S'inscrire</a>
                                      <?php endif; ?>
                                    </div>
                                </div>
                      <?php
                              $comptage++;
                              if ($comptage>=3){
                                $comptage = 0;
                      ?>
                                </div>
                              </div>
                                <div class="cards">
                                  <div class="row justify-content-around mb-3">
                      <?php } } } ?>

          </div>
      </div>

  </section>

<?php include_once("vue/vue_footer.php"); ?>
