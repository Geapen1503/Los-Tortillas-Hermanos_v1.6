<?php
ob_start();
$conn = mysqli_connect("localhost", "root", "", "lth");
if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}
?>
<div id="upBande"></div>

<header>
    <div class="headerLogo">
        <a class="buttonLogo" href="/"><img class="Logo" src="../public/img/logoLosTortillas.png"></a>
    </div>

    <div class="headerLoginOkBox">
        <div class="loginOkBox">
            <!-- <a class="cartImg" href="cart"><img src="../public/img/shop_icon.png"></a> -->
            <?php
            if (isset($_SESSION["login"])) {
                $loginStatus = $_SESSION["login"] == True;

                if ($loginStatus) {
                    echo "<a class='askProfile' href='profile'><img class='askProfileImg' src='../public/img/icoProfile.png'></a>";
                } else {
                    echo "<a class='askLogin' href='login'><img class='askLoginImg' src='../public/img/login_icon.png'></a>";
                }
            } else {
                echo "<a class='askLogin' href='login'><img class='askLoginImg' src='../public/img/login_icon.png'></a>";
            }
            ?>
        </div>
    </div>
</header>

<div id="buttonBox">
    <a href="/history" class="buttona">OUR HISTORY</a>
    <img class="Losange" src="../public/img/petitLosange.png">
    <a href="/values" class="buttona">OUR VALUES</a>
    <img class="Losange" src="../public/img/petitLosange.png">
    <a href="/job" class="buttona">JOB LISTINGS</a>
</div>

