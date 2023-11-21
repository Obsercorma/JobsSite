<?php 
    include "vue/vue_entete.php";
?>
<body>
    <h1 class="title text-white">Déposer CV</h1>
    <div class="mb-3">
    <input class="form-control" type="file" id="formFile" accept=".png, .jpg, .jpeg, .pdf">
    </div>
    <div id="pdfPreview"></div>
    <a href="index.php?section=lesOffres" class="btn btn-light mb-3" style="display: inline-block; width: auto;">Découvrir les offres</a>

    <script>
        document.getElementById('formFile').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.getElementById('pdfPreview');
                if (file.type === "application/pdf" || file.type === "image/jpeg" || file.type === "image/png") {
                    if (file.type === "application/pdf") {
                        preview.innerHTML = '<embed src="' + e.target.result + '" type="application/pdf" width="100%" height="600px" />';
                    } else {
                        preview.innerHTML = '<img src="' + e.target.result + '" alt="Aperçu de l\'image" style="max-width: 100%; max-height: 600px;" />';
                    }
                } else {
                    alert('Seuls les fichiers PDF, PNG et JPG sont pris en charge.');
                }
            };
            reader.readAsDataURL(file);
        });

    </script>
</body>
</html>