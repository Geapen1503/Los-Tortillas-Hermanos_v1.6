<?php
ob_start();
?>
    <link rel="stylesheet" href="../public/css/meth.css">
    <link rel="stylesheet" href="../public/littlecss/lmeth.css" media="screen and (max-width: 1000px)">
<?php
$head = ob_get_clean();

ob_start();
?>

<div id="MainBox">

    <div id="methBox1">
        <img class="methIMG1" src="../public/img/tasMeth.jpg">

        <div id="textMeth1">
            <p class="pMeth">And as you can see Los Tortillas Hermanos also have a side business, la Methamfétamina esta cocinera by Flyn Junior Blanco</p>
            <p class="methJoke">pls don't send me in jail it was just a "breaking bad" joke</p>
        </div>

        <img class="methIMG2" src="../public/img/cookingMeth.jpg">

    </div>

</div>

<?php
$content = ob_get_clean();
