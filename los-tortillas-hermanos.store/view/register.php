<?php
ob_start();
//session_start();
$conn = mysqli_connect("localhost", "root", "", "lth");

if (!$conn) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}

?>
<link rel="stylesheet" href="../public/css/register.css">
<link rel="stylesheet" href="../public/littlecss/lregister.css" media="screen and (max-width: 1000px)">
<?php
$head = ob_get_clean();
ob_start();
?>


<div id="MainBox">
<!-- action="../model/register.php" -->
    <form class="registerBox" action="" method="post" >
        <input id="textFieldRegister" type="text" name="username" placeholder="Username...">
        <input id="textFieldRegister" type="email" name="email" placeholder="Email...">
        <input id="textFieldRegister" type="password" name="password" placeholder="Password...">
        <input id="textFieldRegister" type="password" name="confirmpassword" placeholder="confirm password...">
        <button id="submit" type="submit" name="submit">Register</button>
    </form>


    <?php
    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
            echo "This username or email as already be taken, choose another one";
        } else {
            if ($password == $confirmpassword) {
                $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Registration Success, you can now login !";
                } else {
                    echo "Error : " . mysqli_error($conn);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Password Confirm does not match !";
            }
        } // you have to add a veryfication to check if the input are empty or not
    }
    ?>

</div>

<?php
$content = ob_get_clean();