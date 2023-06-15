<?php
ob_start();
$conn = mysqli_connect("localhost", "root", "", "lth");
if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}
?>
<link rel="stylesheet" href="../public/css/login.css">
<link rel="stylesheet" href="../public/littlecss/llogin.css" media="screen and (max-width: 1000px)">
<?php
$head = ob_get_clean();
ob_start();
?>

<div id="MainBox">
    <form class="loginBox" method="post" action="">
        <input id="usernameemail" type="text" name="usernameemail" placeholder="Username or Email...">
        <input id="password" type="password" name="password" placeholder="Password...">
        <button id="subLogButton" type="submit" name="submit">Login</button>
        <a class="registerButton" href="register">Register?</a>
    </form>
<?php
if(isset($_POST["submit"])){
    $usernameemail = mysqli_real_escape_string($conn, $_POST["usernameemail"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $usernameemail, $usernameemail);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION['username'] = $usernameemail;
            $_SESSION["login"] = True;
            $_SESSION["id"] = $row["id"];
            //header("Location: ../view/index.php");
            echo "You're logged !";
        } else {
            echo "Wrong password !";
        }
    } else {
        echo "User not register ! Please register";
    }
}
?>
</div>

<?php
$content = ob_get_clean();