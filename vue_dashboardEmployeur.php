<?php 
    include "vue/vue_entete.php";
?>
<body>
    <h1 class="title fw-bold">Tableau de bord employeur</h1>
    <h2 class="fw-bold mx-auto">
    Prénom/Nom/Société
    </h2>
    <section class="actions-grp">
        <div class="card border-0">
            <div class="card-body gray-box bg-secondary rounded">
                <a href="index.php?section=depotAnno" class="btn btn-outline-light border-2">Déposer une annonce</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body gray-box bg-secondary rounded">
                <a href="index.php?section=mesOffres" class="btn btn-outline-light border-2">Voir mes offres</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body gray-box bg-secondary rounded">
                <a href="index.php?section=activitesRecentes" class="btn btn-outline-light border-2">Activités récentes</a>
            </div>
        </div>
    </section>
    <a href="index.php?section=lesEtuds" class="btn btn-light mb-3">Découvrir les offres</a>
</body>
</html>
