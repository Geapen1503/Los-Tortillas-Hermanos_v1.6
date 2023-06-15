<?php
ob_start();
?>
<link rel="stylesheet" href="../public/css/job.css">
<link rel="stylesheet" href="../public/littlecss/ljob.css" media="screen and (max-width: 1000px)">
<?php
$head = ob_get_clean();

ob_start();
?>

<div id="MainBox">
    <div id="laCafJob">
        <p class="cafp">There no job here, we are in France</p>
        <p class="cafpR">but you can contact us right here (pls contact us, this contact thing was hard to make)</p>
    </div>

    <div id="contactBox">

        <p class="contactPresText">Contact us right here !<br>(did lalo sent you ?)</p>
        <form method="post">
            <label>Name :</label>
            <input type="text" name="nom" required>
            <label>Email :</label>
            <input type="email" name="email" required>
            <label>Subject :</label>
            <input type="text" name="sujet" required>
            <label>Message :</label>
            <textarea name="message" required></textarea>
            <input class="buttoni" type="submit" value="Submit">
        </form>

        <?php
        if (isset($_POST["message"])) {
            $message = "Ce message vous a été envoyé via la page contact du site de Los-Tortillas-Hermanos
					Nom : " . $_POST["nom"] . "
					Email : " . $_POST["email"] . "
					Message : " . $_POST["message"];
            $retour = mail("alkudev@gmail.com", $_POST["sujet"], $message, "From:contact@exemplesite.fr" . "\r\n" . "Reply-to:" . $_POST["email"]);
            if ($retour) {
                echo "l'email a bien été envoyé.";
            }
        }
        ?>


    </div>


</div>

<?php
$content = ob_get_clean();