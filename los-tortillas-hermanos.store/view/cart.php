<?php
ob_start();
$conn = mysqli_connect("localhost", "root", "", "lth");
if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}
?>
    <link rel="stylesheet" href="../public/css/cart.css">
    <link rel="stylesheet" href="../public/littlecss/lcart.css" media="screen and (max-width: 1000px)">

    <div id="MainBox">

        <div id="cartBox">
            <p class="cartTitle">~ Shopping Cart ~</p>
            <p class="cartDescri">These are the items you have in your shopping cart</p>
            <div class="cartItemsBox">
                <?php

                if (isset($_SESSION["login"])) {
                    $loginStatus = $_SESSION["login"] == False;

                    if ($loginStatus) { //if the user login is set on False
                        error_reporting(0);
                        ini_set('display_errors', 0);
                        echo "
                        <div class='notLogBox'>
                            <p class='notLogText'>Login before access to the shop cart !</p>
                            <a class='notLogButton' href='login'>Login</a>
                        </div> 
                        ";
                    } else { // if the user is logged, and he has access to the cart
                        $username = $_SESSION['username'];
                        $sql = "SELECT producttype1, producttype2, producttype3 FROM users WHERE username='$username'";
                        $result = mysqli_query($conn, $sql);

                        $row = mysqli_fetch_assoc($result);
                        $producttype1 = $row['producttype1'];
                        $producttype2 = $row['producttype2'];
                        $producttype3 = $row['producttype3'];

                        // beginning of lalito product part

                        if ($producttype1 == 1) { //if the user has the product lalitoAutograph
                            echo "
                                <div class='lalitoAutographCartBox'>
                                    <div class='imgBox'>
                                        <img class='lalitoAutographImg' src='../public/img/lalitoSigna.png'>
                                    </div>
                                    <div class='descriBox'>
                                        <form method='post' action=''>
                                            <p class='productTitle'>Lalito Autograph</p>
                                            <p class='productDescri'>Lalito is the chief of the security team of Los Tortillas Hermanos. This is the cheapest Autograph of the shop, if you buy this one, you're a certified rat.</p>
                                            <div class='numberItemsBox'>
                                                <form class='changeNumbersForm' method='post' action=''>
                                                    <button id='fewer' name='fewer' type='submit'>-</button>
                                                        <p class='numberItemText'>&nbsp;1&nbsp;</p>
                                                    <button id='plus' name='plus' type='submit'>+</button>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                                </div> 
                                ";

                        } else { // if there is more than 1 same product
                            $nsql = "SELECT producttype1 FROM users WHERE username='$username'";
                            $nresult = mysqli_query($conn, $nsql);
                            $nrow = mysqli_fetch_assoc($nresult);

                            if ($producttype1 > 1) {
                                echo "
                                    <div class='lalitoAutographCartBox'>
                                        <div class='imgBox'>
                                            <img class='lalitoAutographImg' src='../public/img/lalitoSigna.png'>
                                        </div>
                                        <div class='descriBox'>
                                            <form method='post' action=''>
                                                <p class='productTitle'>Lalito Autograph</p>
                                                <p class='productDescri'>Lalito is the chief of the security team of Los Tortillas Hermanos. This is the cheapest Autograph of the shop, if you buy this one, you're a certified rat.</p>
                                                <div class='numberItemsBox'>
                                                    <form class='changeNumbersForm' method='post' target='frame'>
                                                        <button id='fewer' name='fewer' type='submit'>-</button>
                                                            <p class='numberItemTextMore'>";
                                echo $nrow['producttype1'];
                                echo "                      </p>
                                                        <button id='plus' name='plus' type='submit'>+</button>
                                                    </form>
                                                </div>
                                                <!-- <button id='lalitoSubmit' name='lalitoSubmit' type='submit'>Remove</button> -->
                                            </form>
                                        </div>
                                    </div> 
                                    ";
                            }
                        }

                        if (isset($_POST['plus'])) { // if user click on the plus button
                            $psql = "SELECT producttype1 FROM users WHERE username='$username'";
                            $presult = mysqli_query($conn, $psql);
                            $plus = $producttype1 + 1;

                            $pquery = "UPDATE users SET producttype1 = ? WHERE username='$username'";
                            $stmt = $conn->prepare($pquery);
                            $stmt->bind_param("s", $plus);
                            $stmt->execute();

                            header("Location: cart#cartBox");
                        } elseif (isset($_POST['fewer'])) { // if the user click on the fewer button
                            $fsql = "SELECT producttype1 FROM users WHERE username='$username'";
                            $fresult = mysqli_query($conn, $fsql);
                            $fewer = $producttype1 - 1;

                            $fquery = "UPDATE users SET producttype1 = ? WHERE username='$username'";
                            $stmt = $conn->prepare($fquery);
                            $stmt->bind_param("s", $fewer);
                            $stmt->execute();

                            header("Location: cart#cartBox");
                        }


                        if ($producttype1 < 0) { // to prevent the bug that set values under 0
                            $esql = "SELECT  producttype1 FROM users WHERE username='$username'";
                            $eresult = mysqli_query($conn, $esql);
                            $zero = 0;

                            $equery = "UPDATE users SET producttype1=? WHERE username='$username'";
                            $stmt = $conn->prepare($equery);
                            $stmt->bind_param("s", $zero);
                            $stmt->execute();

                            header("Refresh:0");
                        }

                    }

                    // end of lalito product part

                    // beginning of miguel product part

                        if ($producttype2 == 1) { //if the user has the product miguelAutograph
                            echo "
                                <div class='miguelAutographCartBox'>
                                    <div class='imgBox'>
                                        <img class='miguelAutographImg' src='../public/img/miguelSigna.png'>
                                    </div>
                                    <div class='descriBox'>
                                        <form method='post' action=''>
                                            <p class='productTitle'>Miguel Autograph</p>
                                            <p class='productDescri'>Miguel Salazar is the boss of Los Tortillas Hermanos. This is the most expensive autograph of the shop, because Mr Salazar don't have time for this.</p>
                                            <div class='numberItemsBox'>
                                                <form class='changeNumbersForm' method='post' action=''>
                                                    <button id='fewer2' name='fewer2' type='submit'>-</button>
                                                        <p class='numberItemText'>&nbsp;1&nbsp;</p>
                                                    <button id='plus2' name='plus2' type='submit'>+</button>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                                </div> 
                                ";

                        } else { // if there is more than 1 same product
                            $nsql = "SELECT producttype2 FROM users WHERE username='$username'";
                            $nresult = mysqli_query($conn, $nsql);
                            $nrow = mysqli_fetch_assoc($nresult);

                            if ($producttype2 > 1) {
                                echo "
                                    <div class='miguelAutographCartBox'>
                                        <div class='imgBox'>
                                            <img class='miguelAutographImg' src='../public/img/miguelSigna.png'>
                                        </div>
                                        <div class='descriBox'>
                                            <form method='post' action=''>
                                                <p class='productTitle'>Miguel Autograph</p>
                                                <p class='productDescri'>Miguel Salazar is the boss of Los Tortillas Hermanos. This is the most expensive autograph of the shop, because Mr Salazar don't have time for this.</p>
                                                <div class='numberItemsBox'>
                                                    <form class='changeNumbersForm' method='post' target='frame'>
                                                        <button id='fewer2' name='fewer2' type='submit'>-</button>
                                                            <p class='numberItemTextMore'>";
                                echo $nrow['producttype2'];
                                echo "                      </p>
                                                        <button id='plus2' name='plus2' type='submit'>+</button>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div> 
                                    ";
                            }
                        }

                        if (isset($_POST['plus2'])) { // if user click on the plus button
                            $psql = "SELECT producttype2 FROM users WHERE username='$username'";
                            $presult = mysqli_query($conn, $psql);
                            $plus = $producttype2 + 1;

                            $pquery = "UPDATE users SET producttype2 = ? WHERE username='$username'";
                            $stmt = $conn->prepare($pquery);
                            $stmt->bind_param("s", $plus);
                            $stmt->execute();

                            header("Location: cart#cartBox");
                        } elseif (isset($_POST['fewer2'])) { // if the user click on the fewer button
                            $fsql = "SELECT producttype2 FROM users WHERE username='$username'";
                            $fresult = mysqli_query($conn, $fsql);
                            $fewer = $producttype2 - 1;

                            $fquery = "UPDATE users SET producttype2 = ? WHERE username='$username'";
                            $stmt = $conn->prepare($fquery);
                            $stmt->bind_param("s", $fewer);
                            $stmt->execute();

                            header("Location: cart#cartBox");
                        }


                        if ($producttype2 < 0) { // to prevent the bug that set values under 0
                            $esql = "SELECT  producttype2 FROM users WHERE username='$username'";
                            $eresult = mysqli_query($conn, $esql);
                            $zero = 0;

                            $equery = "UPDATE users SET producttype2=? WHERE username='$username'";
                            $stmt = $conn->prepare($equery);
                            $stmt->bind_param("s", $zero);
                            $stmt->execute();

                            header("Refresh:0");
                        }



                    // end of miguel product part

                    // beginning of the flynn jr blanco part

                    if ($producttype3 == 1) { //if the user has the product flynnAutograph
                        echo "
                                <div class='flynnAutographCartBox'>
                                    <div class='imgBox'>
                                        <img class='flynnAutographImg' src='../public/img/flynnJr.png'>
                                    </div>
                                    <div class='descriBox'>
                                        <form method='post' action=''>
                                            <p class='productTitle'>Flynn Autograph</p>
                                            <p class='productDescri'>Flynn Jr Blanco is the cook of Los Tortillas Hermanos. Flynn is mentally and physically retard, so by buying this autograph, you're helping him.</p>
                                            <div class='numberItemsBox'>
                                                <form class='changeNumbersForm' method='post' action=''>
                                                    <button id='fewer3' name='fewer3' type='submit'>-</button>
                                                        <p class='numberItemText'>&nbsp;1&nbsp;</p>
                                                    <button id='plus3' name='plus3' type='submit'>+</button>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                                </div> 
                                ";

                    } else { // if there is more than 1 same product
                        $nsql = "SELECT producttype3 FROM users WHERE username='$username'";
                        $nresult = mysqli_query($conn, $nsql);
                        $nrow = mysqli_fetch_assoc($nresult);

                        if ($producttype3 > 1) {
                            echo "
                                    <div class='flynnAutographCartBox'>
                                        <div class='imgBox'>
                                            <img class='flynnAutographImg' src='../public/img/flynnJr.png'>
                                        </div>
                                        <div class='descriBox'>
                                            <form method='post' action=''>
                                                <p class='productTitle'>Flynn Autograph</p>
                                                <p class='productDescri'>Flynn Jr Blanco is the cook of Los Tortillas Hermanos. Flynn is mentally and physically retard, so by buying this autograph, you're helping him.</p>
                                                <div class='numberItemsBox'>
                                                    <form class='changeNumbersForm' method='post' target='frame'>
                                                        <button id='fewer3' name='fewer3' type='submit'>-</button>
                                                            <p class='numberItemTextMore'>";
                            echo $nrow['producttype3'];
                            echo "                      </p>
                                                        <button id='plus3' name='plus3' type='submit'>+</button>
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div> 
                                    ";
                        }
                    }

                    if (isset($_POST['plus3'])) { // if user click on the plus button
                        $psql = "SELECT producttype3 FROM users WHERE username='$username'";
                        $presult = mysqli_query($conn, $psql);
                        $plus = $producttype3 + 1;

                        $pquery = "UPDATE users SET producttype3 = ? WHERE username='$username'";
                        $stmt = $conn->prepare($pquery);
                        $stmt->bind_param("s", $plus);
                        $stmt->execute();

                        header("Location: cart#cartBox");
                    } elseif (isset($_POST['fewer3'])) { // if the user click on the fewer button
                        $fsql = "SELECT producttype3 FROM users WHERE username='$username'";
                        $fresult = mysqli_query($conn, $fsql);
                        $fewer = $producttype3 - 1;

                        $fquery = "UPDATE users SET producttype3 = ? WHERE username='$username'";
                        $stmt = $conn->prepare($fquery);
                        $stmt->bind_param("s", $fewer);
                        $stmt->execute();

                        header("Location: cart#cartBox");
                    }


                    if ($producttype3 < 0) { // to prevent the bug that set values under 0
                        $esql = "SELECT  producttype3 FROM users WHERE username='$username'";
                        $eresult = mysqli_query($conn, $esql);
                        $zero = 0;

                        $equery = "UPDATE users SET producttype3=? WHERE username='$username'";
                        $stmt = $conn->prepare($equery);
                        $stmt->bind_param("s", $zero);
                        $stmt->execute();

                        header("Refresh:0");
                    }

                    // ending of the flynn jr blanco part

                    if ($_SESSION['login'] == True) {
                        if ($producttype1 == 0 && $producttype2 == 0 && $producttype3 == 0){
                            echo "<p class='emptyCartText'>Your shopping cart is empty !</p>";
                        }
                    }

                } else { // if the var user login is not set
                    echo "
                        <div class='notLogBox'>
                            <p class='notLogText'>Login before access to the shop cart !</p>
                            <a class='notLogButton' href='login'>Login</a>
                        </div> ";
                }
                ?>
            </div>
        </div>

    </div>


<?php
$content = ob_get_clean();