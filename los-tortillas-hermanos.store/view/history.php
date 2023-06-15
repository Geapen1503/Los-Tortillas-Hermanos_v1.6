<?php
ob_start();

$conn = mysqli_connect("localhost", "root", "", "lth");
if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}
?>
<link rel="stylesheet" href="../public/css/history.css">
<link rel="stylesheet" href="../public/littlecss/lhistory.css" media="screen and (max-width: 1000px)">
<?php
$head = ob_get_clean();

ob_start();
?>

<div id="MainBox">

    <div class="loginEnterBox">
        <a class="loginButton" href="login">
            Login
        </a>
    </div>


    <!-- <div id="mercyTextBox">
        <p class="mercyText">
            The Tortillas Brothers fight all their life to survive in Zacatecas, but now the Tortillas Brother need money like our famous uncle : "Dutch Van Der Linde", so you can buy something here or just give us MONEY.
        </p>
    </div> -->

    <div id="productBox">

        <div class="textProductBox">

            <p class="productTitle">Autographs</p>
            <p class="productCollector">Collector</p>
            <p id="productPrice">0.01 €</p>
            <p class="typeAuto">model :</p>
            <div class="model">
                <a id="auto1"></a>
                <a id="auto2"></a>
                <a id="auto3"></a>
            </div>
            <p class="productTDescription">Description :</p>
            <p class="productDescription">You can choose your autograph and BUY it. There Lalito, Flynn Jr Blanco and Miguel Salazar Autograph, it's priceless, BUY IT NOW !</p>
            <a id="buyButton" href="add-to-cart1">Add to Cart</a>

        </div>

        <div class="imgProductBox">
            <img id="lalito" src="../public/img/lalitoSigna.png" alt="">
        </div>

        <script type="text/javascript">

            let auto1 = document.querySelector('#auto1');
            let auto2 = document.querySelector('#auto2');
            let auto3 = document.querySelector('#auto3');
            let image = document.querySelector('#lalito');
            let productPrice = document.querySelector('#productPrice')
            let buyButtonHref = document.querySelector('#buyButton');

            auto1.addEventListener('click', () =>{
                image.src = "../public/img/lalitoSigna.png";
                productPrice.innerHTML = "0.01 €";
                buyButtonHref.href = "add-to-cart1";
            });

            auto2.addEventListener('click', () =>{
                image.src = "../public/img/miguelSigna.png";
                productPrice.innerHTML = "1.00 €";
                buyButtonHref.href = "add-to-cart2";
            });

            auto3.addEventListener('click', () =>{
                image.src = "../public/img/flynnJr.png";
                productPrice.innerHTML = "0.50 €";
                buyButtonHref.href = "add-to-cart3";
            });

        </script>

    </div>

</div>

<?php
$content = ob_get_clean();