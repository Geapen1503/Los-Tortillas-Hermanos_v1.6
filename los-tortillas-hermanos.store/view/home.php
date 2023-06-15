<?php
ob_start();
?>
    <link rel="stylesheet" href="../public/css/home.css">
    <link rel="stylesheet" href="../public/littlecss/lhome.css" media="screen and (max-width: 1000px)">
<?php
$head = ob_get_clean();

ob_start();
?>
    <!-- If you want to steal my code, remember someone is always watching you at Los-Tortillas-Hermanos -->
    <div id="containerBox">

        <div id="MainBox">
            <div id="startBox">

                <img class="pimento" src="../public/img/pimento.png">

                <div id="welcomeBox">
                    <p class="welcomeText"><q class="bigGui">It's the best ingredients, The sweetest spices, All prepared with loving care ! And always delivered late with hate. That's the los Tortillas Hermanos promise.</q></p>
                    <p class="signature">Miguel Salazar - Owner and Proprietor</p>
                </div>
            </div>

            <div id="midBox">
                <div id="caroussel">
                    <div class="img">
                        <img class="dimg" src="../public/img/AbueloTortilla.jpg">
                        <img class="dimg" src="../public/img/avocadoTortillas.png">
                        <img class="dimg" src="../public/img/desasTortillas.jpg">
                        <img class="dimg" src="../public/img/empiladasTortillas.jpeg">
                        <img class="dimg" src="../public/img/haricosTortillas.png">
                        <img class="dimg" src="../public/img/jamonesTortillas.jpeg">
                        <img class="dimg" src="../public/img/legumasTortillas.png">
                    </div>
                </div>
            </div>

            <div id="secondBox">
                <a class="noirServ" href="methError">
                    <img class="negServ" src="../public/img/serveurNoir.jpg">
                </a>
            </div>
        </div>

<?php
$content = ob_get_clean();
