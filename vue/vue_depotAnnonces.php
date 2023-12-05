<?php 
    include "vue/vue_entete.php";
?>
<body>
<br>

    <h1 class="text-center text-white">Déposer une annonce</h1>

      <div class="rounded-3 col-md-8 row flex-nowrap bg-black bg-opacity-25 w-75 mx-auto p-3 align-self-center">


        <div class="col-md-6 align-self-center">
         <div class="col">
          <form action="#" method="post">


            <div class="form-floating mb-3">
              <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Titre de l'annonce</label>
            </div>

            <div class="mb-3">
              <select class="form-select" name="">
                <option value="">-- Sélectionner --</option>
                <option value="">Autres</option>
                <option value="">Agroalimentaire</option>
                <option value="">Banque / Assurance</option>
                <option value="">Bois / Papier / Carton / Imprimerie</option>
                <option value="">BTP / Matériaux de construction</option>
                <option value="">Chimie / Parachimie</option>
                <option value="">Commerce / Négoce / Distribution</option>
                <option value="">Edition / Communication / Multimédia</option>
                <option value="">Electronique / Electricité</option>
                <option value="">Etudes et conseils</option>
                <option value="">Industrie pharmaceutique</option>
                <option value="">Informatique / Télécoms</option>
                <option value="">Machines et équipements / Automobile</option>
                <option value="">Métalurgie / Travail du métal</option>
                <option value="">Plastique / Caoutchouc</option>
                <option value="">Services aux entreprises</option>
                <option value="">Textile / Habillement / Chaussure</option>
                <option value="">Transport / Logistique</option>
              </select>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Lieu de travail</label>
            </div>

            <div class="form-floating mb-3">
              <input type="date" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Début de la période de travail</label>
            </div>

            <div class="form-floating mb-3">
              <input type="date" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Fin de la période de travail</label>
            </div>

            <div class="mb-3 bg-white rounded-1">
              <label>Type de contrat</label>
<br>
              <div class="form-check form-check-inline">
                <input class="form-check-input- margin-" type="radio" name="typecontrat" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">CDI</label>
              </div>

              <div class="form-check form-check-inline">
                <input class="form-check-input-" type="radio" name="typecontrat" value="option2">
                <label class="form-check-label" for="inlineCheckbox2">CDD</label>
              </div>

              <div class="form-check form-check-inline">
                <input class="form-check-input-" type="radio" name="typecontrat" value="option3">
                <label class="form-check-label" for="inlineCheckbox2">CP*</label>
              </div>

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
            <textarea class="form-control rs-none" id="exampleFormControlTextarea1" rows="10"></textarea>
          </div>

        </div>

    </form>

      </div>



  </body>

</html>
