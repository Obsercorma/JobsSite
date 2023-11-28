<?php
    include "vue/vue_entete.php";
?>

<body>


      <h1 class="text-center text-white">Mes offres</h1>

    <div class="cards">
      <div class="row justify-content-around">

          <?php foreach($listOffers as $offer): ?>
          <div class="card bg-dark bg-opacity-25 text-white rounded border-dark border-3 col-3">
            <img src="vue/images/user.png" class="card-img-top">
            <div class="card-body">
              <h3 class="card-title"><?= $offer["intitoffre"] ?></h3>
              <h6>Secteur : <u>Grande distribution</u></h6>
              <br>
              <p class="card-text"><?= $offer["descOffre"] ?></p>
              <div class="d-flex flex-nowrap justify-content-between">
                <a href="#" class="btn btn-primary col-6 btn-lg me-2">Modifier</a>
                <a href="#" class="btn btn-primary col-6 bg-transparent btn-lg ms-2">Supprimer</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

          <!--<div class="card bg-dark bg-opacity-25 text-white rounded border-dark border-3 col-3">
            <img src="vue/images/user.png" class="card-img-top">
            <div class="card-body">
              <h3 class="card-title">Assistant F/H de récolte</h3>
              <h6>Secteur : <u>Agroalimentaire</u></h6>
              <br>
              <p class="card-text">Votre mission consiste à récolter préparer laver et trier les produits de nos producteurs</p>
              <div class="d-flex flex-nowrap justify-content-between">
                <a href="#" class="btn btn-primary col-6 btn-lg me-2">Modifier</a>
                <a href="#" class="btn btn-primary col-6 bg-transparent btn-lg ms-2">Supprimer</a>
              </div>
            </div>
          </div>

          <div class="card bg-dark bg-opacity-25 text-white rounded border-dark border-3 col-3">
            <img src="vue/images/user.png" class="card-img-top">
            <div class="card-body">
              <h3 class="card-title">Caissier F/H E.Leclerc</h3>
              <h6>Secteur : <u>Grande distribution</u></h6>
              <br>
              <p class="card-text">Votre mission consiste à encaisser les clients de notre magasin, lors de leur passage en caisse.
                                    Expérience passée dans le domaine de la vente est un plus !</p>
              <div class="d-flex flex-nowrap justify-content-between">
                <a href="#" class="btn btn-primary col-6 btn-lg me-2">Modifier</a>
                <a href="#" class="btn btn-primary col-6 bg-transparent btn-lg ms-2">Supprimer</a>
              </div>
            </div>
          </div>-->
    </div>
  </div>



</body>
</html>
