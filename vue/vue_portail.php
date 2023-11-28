<?php
    include "vue/vue_entete.php";
?>
<div>

  <div class="col-md-12">
    <h1 class="text text-center">Bienvenue sur Jobs !</h1>
  </div>

<br><br>

<section id="aPropos">
  <div class="rounded-3 col-md-9 row bg-black bg-opacity-25 w-75 mx-auto p-3 align-self-center text-white" id="#aPropos">


    <h3 class="text text-center">Qu'est-ce que <em>Jobs</em> ?</h3>
<br>
      <div class="row">
        <div class="col-md-8 w-75 mx-auto">

          <p class="text-center"><em>Jobs</em> est une plateforme innovante, pour décrocher une mission. Ici, vous retrouverez
          différentes tâches rémunérées, que proposent entreprises comme particulier. A court terme comme à long
          terme, nos collaborateurs ont ce qu'il vous faut ! Alors n'attendez-plus, postulez !</p>

        </div>
      </div>
    </div>
</section>

<br><br>

  </div>

  <br><br>


  <div class="rounded-3 col-md-9 row bg-black bg-opacity-25 w-75 mx-auto p-3 align-self-center text-white">

    <h4 class="text text-center">Nos derniers jobs</h4>

    <div class="row">

      <?php
          foreach ($dernieresAnnonces as $annonces)
          {
            $intitOffre = $annonces['intitoffre'];
            $datePublication = $annonces['datePublication'];
      ?>
            <div class="col-md-4 text-center">
              <img src="vue/images/user.png" title="image-theme" width="50%">
              <br><br>
              <p><b><?= $intitOffre ?></b></p>
              <p><?= $datePublication ?></p>
            </div>
      <?php
          }
       ?>

        <div class="text text-center">
          <a class="btn btn-primary" href="index.php?section=lesOffres" role="button">Découvrir toutes les offres</a>
        </div>

  </div>    <!-- DIV CLASS ROUNDED-3...   -->
</div>
<?php include_once("vue/vue_footer.php"); ?>
