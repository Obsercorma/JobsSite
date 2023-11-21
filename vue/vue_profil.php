<?php
    include "vue/vue_entete.php";
?>
    <h1 class="title fw-bold">Profil</h1>
    <div class="card bg-dark bg-opacity-25 text-white rounded border-dark border-3 col-3">
      <img src="vue/images/user.png" class="card-img-top">
      <div class="card-body">
        <hr>
        <h4 class="card-title">NOM Prénom</h4>
          <p class="card-text">Infos principales de la personne.</p>
          <a href="#" class="btn btn-primary">Envoyer un message</a>
          <a href="#" class="btn btn-light">Voir son CV</a>
      </div>
    </div>
    <a href="index.php?section=lesOffres" class="btn btn-primary mb-3 mt-3">Découvrir les offres</a>

<?php include_once("vue/vue_footer.php"); ?>
