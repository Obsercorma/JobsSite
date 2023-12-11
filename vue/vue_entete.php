<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $title_page ?? "Jobs" ?></title>
    <link rel="stylesheet" href="vue/css/style.css">
    <link rel="stylesheet" href="vue/css/bootstrap.min.css">
    <link rel="icon" href="vue/images/J.ico" type="image/x-icon">
    <script src="vue/js/bootstrap.bundle.min.js" defer></script>
</head>

<body class="p-0">
    <div class="row">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="row justify-content-between">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <div class="col-lg-4 align-self-center">
                        <a class="ms-3 navbar-brand ms-3 navbar-brand d-md-flex justify-content-md-center" href="index.php">
                            <img src="vue/images/logoJobsEtudiant.jpg" class="logoEntete">
                        </a>
                    </div>
                    
<!--- BARRE DE RECHERCHE ----------------------------------------------------------------------------------->
                        <div class="col-lg-4 align-self-center mb-3">
                            <form class="d-flex" role="search">

                                <div class="input-group">
                                    <input class="form-control" type="search" placeholder="Un job en tête ?" aria-label="Search">
                                    <button class="btn btn-primary" type="submit">Rechercher</button>
                                </div>

                            </form>
                        </div>
  
<!-- CONNEXION / INSCRIPTION  ------------------------------------------------------------------------------>
                        <div class="col-lg-4 align-self-center mb-3">
                            <div class="d-flex justify-content-md-around justify-content-lg-end">
                                <a href="index.php?section=<?= $isConnected ? "logout" : "login" ?>" class="btn btn-<?= $isConnected ? "danger" : "success" ?>"><?= $isConnected ? "Se déconnecter" : "Se Connecter/S'inscrire" ?></a>
                                <?php if($isConnected): ?>
                                    <a href="?section=<?= intval($_SESSION["status"])!=1 ? "dashboardEmploi" : "dashboardEtud" ?>" class="btn btn-primary">Mon tableau de bord</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
