<?php
ob_start();
$conn = mysqli_connect("localhost", "root", "", "lth");
?>

<link rel="stylesheet" href="../public/css/add-to-cart1.css">
<link rel="stylesheet" href="../public/littlecss/ladd-to-cart1.css" media="screen and (max-width: 1000px)">

<div id="MainBox">
    <div class="confirmLalitoPurchaseBox">
        <p class="confirmLalitoPurchaseText">Confirm your Username and your password to confirm the purchase of Lalito autograph</p>
        <form id="confirmForm" method="post">
            <input id="username" type="text" name="username" placeholder="Username...">
            <input id="password" type="password" name="password" placeholder="Password...">
            <button id="confirmLalitoPurchase" type="submit" name="submit">Confirm Purchase</button>
        </form>
    </div>
    <?php
    if (isset($_POST["submit"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $laloAutograph = 1;

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (mysqli_num_rows($result) > 0) {
            if ($_SESSION["login"] == true) {
                if ($username == $row["username"] && $password == $row["password"]) {
                    $query = "UPDATE users SET producttype1 = ? WHERE username = ? AND password = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("sss", $laloAutograph, $username, $password);
                    $stmt->execute();

                    echo "
                    <div class='addSuccessBox'>
                        <p class='addSuccessText'>Product ~ Lalito Autograph ~ was successfully added to cart.</p>
                        <a class='viewCartButton' href='cart'>View Shopping Cart</a>
                    </div>
                ";
                } else {
                    echo "Wrong password!";
                }
            } else {
                echo "Login before doing any purchases!";
            }
        } else {
            echo "User not registered! Please register.";
        }
    }
    ?>
</div>

<?php
$content = ob_get_clean();
?>
