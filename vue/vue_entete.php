<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $title_page ?? "Jobs" ?></title>
    <link rel="stylesheet" href="vue/css/style.css">
    <link rel="stylesheet" href="vue/css/bootstrap.min.css">
    <link rel"icon" href"vue/images/J.ico" type"image/x-icon">
    <script href="vue/js/bootstrap.bundle.min.js" defer></script>
</head>

<body class="px-0">
  <div class="row">
        <nav class="navbar">
          <div class="container-fluid">

            <div class="row justify-content-between">
              <div class="col-4">
                <a class="navbar-brand" href="index.php">
                  <img src="vue/images/logoJobsEtudiant.jpg" class="logoEntete">
                </a>
              </div>
<!--- BARRE DE RECHERCHE ----------------------------------------------------------------------------------->
            <div class="col-4">
              <form class="d-flex" role="search">

                <div class="form-floating">
                  <input class="form-control me-2" type="search" id="floatingInput" placeholder="Une demande ?" aria-label="Search">
                  <label for="floatingInput">Un job en tête ?</label>
                </div>

                  <button class="btn btn-primary" type="submit">Rechercher</button>
              </form>
            </div>

<!-- CONNEXION / INSCRIPTION  ------------------------------------------------------------------------------>
            <div class="col-4 align-self-end">
              <div class="">
                <a href="index.php?section=<?= $isConnected ? "logout" : "login" ?>" class="btn btn-primary"><?= $isConnected ? "Se déconecter" : "Se Connecter/S'inscrire" ?></a>
                <?php if($isConnected): ?>
                <a href="?section=<?= $_SESSION["status"]>1 ? "dashboardEmploi" : "dashboardEtud" ?>" class="btn btn-primary">Mon tableau de bord</a>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
      </nav>
    </div>
