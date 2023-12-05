<?php
    include "vue/vue_entete.php";
?>
<?php

        $prenomEtudiant = $dashboardEtud['prenom'];
        $nomEtudiant = $dashboardEtud['nom'];
?>
<body>
    <h1 class="fw-bold">Tableau de bord étudiant</h1>
    <h2 class="fw-bold mx-auto">
        <em>Bonjour <?= $prenomEtudiant, " ", $nomEtudiant?></em>
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
    </section>
    <a href="index.php?section=lesOffres" class="btn btn-primary mb-3 mt-4">Découvrir les offres</a>
</body>
</html>
