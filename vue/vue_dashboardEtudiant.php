<?php 
    include "vue/vue_entete.php";
?>
<body>
    <h1 class="fw-bold">Tableau de bord étudiant</h1>
    <h2 class="fw-bold mx-auto">
        Bonjour Nom Prénom
    </h2>
    <section class="actions-grp">
        <div class="card border-0">
            <div class="card-body gray-box bg-secondary rounded">
                <a href="index.php?section=depotCV" class="btn btn-outline-light border-2">Déposer mon CV</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body gray-box bg-secondary rounded">
                <a href="index.php?section=activitesRecentes" class="btn btn-outline-light border-2">Voir mes candidatures</a>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-body gray-box bg-secondary rounded">
                <a href="index.php?section=lesOffres" class="btn btn-outline-light border-2">Activités récentes</a>
            </div>
        </div>
    </section>
    <a href="index.php?section=lesOffres" class="btn btn-light mb-3">Découvrir les offres</a>
</body>
</html>