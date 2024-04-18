<?php
    include "vue/vue_entete.php";
?>
    <h1 class="title fw-bold">Liste étudiants</h1>


    <section class="list-students">


      <div class="cards">
          <div class="row justify-content-around mb-3">

                      <?php
                            $comptage = 0;

                            foreach($lesEtudiants as $unEtudiant)
                            {
                              $idEtudiant = $unEtudiant['idUser'];
                              $prenom = $unEtudiant['prenom'];
                              $nom = $unEtudiant['nom'];
                              $biographie = $unEtudiant['bio'];
                      ?>
                                <div class="card text-center fw-bold col-3 border-3 border-dark">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <img src="vue/images/user.png" alt="Etudiant" class="img-student w-75">
                                        <h3 class="student-name"><?= $prenom," ", $nom ?></h3>
                                    </div>
                                    <div class="card-footer">
                                       <p class="card-text"><?= $biographie ?></p>
                                       <a href="index.php?section=unEtud&idEtudiant=<?= $idEtudiant ?>" class="btn btn-primary fw-bold border-2">Consulter le profil</a>
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
                      <?php
                              }
                            }
                      ?>

          </div>
      </div>

  </section>

<?php include_once("vue/vue_footer.php"); ?>
