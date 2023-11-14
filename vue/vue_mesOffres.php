<?php 
    include "vue_entete.php";
?>
    <h1 class="titreprincipal"><b>Mes offres</b></h1>

    <div class="cards">   
        <div class="card bg-dark text-white rounded border-dark border-3">
            <img src="./images/image_test.jpg" alt="Image test">

            <div class="card-body">
                <h2>Caissier H/F E.Leclerc</h2>
                <p>Secteur : <u>Commerce</u></p>
                <p class ="description_offre">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>                
                <a href="#" class="btn btn-outline-light btn-lg btn-block">Modifier</a>
                <a href="#" class="btn btn-danger btn-lg btn-block">Supprimer</a>
            </div>
        </div>

        <div class="card bg-dark text-white rounded border-dark border-3">
            <img src="./images/image_test.jpg" alt="Image test">
        
            <div class="card-body">
                <h2>Assistant H/F de récolte</h2>
                <p>Secteur : <u>Agroalimentaire</u></p>
                <p class="description_offre">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                <a href="#" class="btn btn-outline-light btn-lg btn-block">Modifier</a>
                <a href="#" class="btn btn-danger btn-lg btn-block">Supprimer</a>
            </div>
        </div>
        
        

        <div class="card bg-dark text-white rounded border-dark border-3">
            <img src="./images/image_test.jpg" alt="Image test">
            
            <div class="card-body">
                <h2>Vendeur H/F Lidl</h2>
                <p>Secteur : <u>Commerce</u></p>
                <p class ="description_offre">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                <a href="#" class="btn btn-outline-light btn-lg btn-block">Modifier</a>
                <a href="#" class="btn btn-danger btn-lg btn-block">Supprimer</a>
            </div>
        </div>
    </div>

<?php include_once("vue/vue_footer.php"); ?>