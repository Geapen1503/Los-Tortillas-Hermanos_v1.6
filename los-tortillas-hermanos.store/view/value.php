<?php
ob_start();
?>
    <link rel="stylesheet" href="../public/css/value.css">
    <link rel="stylesheet" href="../public/littlecss/lvalue.css" media="screen and (max-width: 1000px)">
<?php
$head = ob_get_clean();

ob_start();
?>

    <div id="MainBox">

        <p class="welcomeV">
            ~ OUR CULTURE & VALUES ~
        </p>

        <div id="firstBox">

            <div id="enchiladasBox">
                <img class="enchiladas" src="../public/img/enchiladas_1.jpg">
            </div>

            <div id="enchiladasTextBox">
                <p class="enchiladasText">
                    Los Tortillas Hermanos was made in Zacatecas by two brothers, the Tortillas Brothers. Today, we carry on our traditions and we made the best Tortillas of Mexico.
                </p>
            </div>
        </div>


        <div id="secondBox">

            <div id="churrosBox">
                <p class="churrosText">
                    We know how important it is to feed your family. Every meal we give you will be DISGUSTING, COLD, DRY, filled with hate and delivered late. That is our promise to you.
                </p>
            </div>

            <div id="churrosTextBox">
                <img class="churros" src="../public/img/chocolatesChurros.jpg">
            </div>

        </div>

    </div>

<?php
$content = ob_get_clean();
