<?php
ob_start();
$conn = mysqli_connect("localhost", "root", "", "lth");
if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}
?>
<link rel="stylesheet" href="../public/css/profile.css">
<link rel="stylesheet" href="../public/littlecss/lprofile.css" media="screen and (max-width: 1000px)">


    <div id="MainBox">
        <?php
        if ($_SESSION['login'] == True) {
            $username = $_SESSION['username'];
            echo "
                <div class='profileBox'>
                    <div class='topBox'>
                        <div class='profilePicBox'>
                            <img class='profilePicImg' src='../public/img/icoProfile.png'>
                        </div>
                        <div class='descriBox'>
                            <p class='userInfo'>
                        ";
            echo "<span class='logasUserInfo'>Username&nbsp;:</span><span>&nbsp;</span>", $username;
            echo "            
                            </p>
                            
                            <p class='descriTitle'>
                                Description :
                            </p>
                            <p class='descriDescri'>
                                This is the account settings, here you can log out, go to your shopping cart and purchase everything.
                            </p>
                            <form class='editProfileForm' method='post'>
                                <button id='editProfile' name='editProfile' type='submit'>edit profile</button>
                            </form>
                            <p class='cantEditProText'>
                            ";
            if (isset($_POST['editProfile'])) {
                echo "You can't edit your profile !";
            }
            echo "
                            </p>
                        </div>
                    </div>
                    <div class='bottomBox'>
                        <div class='iconBox'>
                            <a class='cartButton' href='cart'><img class='cartImg' src='../public/img/shop_icon.png'></a>
                            <img class='lineIcon' src='../public/img/verticalLineIcon.png'>
                            <a class='logoutButton' href='logout'><img class='logoutButton' src='../public/img/logout_icon.png'></a>
                        </div>
                    </div>
            </div>
            ";
        } else {
            echo "
                <div class='notLogBox'>
                    <p class='notLogText'>Login before access to the shop cart !</p>
                    <a class='notLogButton' href='login'>Login</a>
                </div>
            ";
        }
        ?>


    </div>


<?php
$content = ob_get_clean();