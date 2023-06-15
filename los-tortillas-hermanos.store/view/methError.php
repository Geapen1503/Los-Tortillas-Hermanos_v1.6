<?php
ob_start();
?>
<link rel="stylesheet" href="../public/css/methError.css">
<link rel="stylesheet" href="../public/littlecss/lmethError.css" media="screen and (max-width: 1000px)">
<?php
$head = ob_get_clean();

ob_start();
?>


<div id="MainBox">

    <h1 class="error404Text">
        ERROR 404
    </h1>

    <div id="errorTextBox">
        <p class="errorText">
            <a class="muiSecreto" href="meth">go</a>&nbspaway this is an error
        </p>
    </div>

</div>


<?php
$content = ob_get_clean();